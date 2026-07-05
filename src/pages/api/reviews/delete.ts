import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';

export const prerender = false;

const getSupabase = () => {
    const supabaseUrl = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
    const supabaseKey = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
    if (!supabaseUrl || !supabaseKey) throw new Error("Missing Supabase Variables");
    return createClient(supabaseUrl, supabaseKey);
};

export const POST: APIRoute = async ({ request }) => {
  try {
    const formData = await request.formData();
    
    // Input Validation
    const reviewId = formData.get('review_id')?.toString().trim();
    const deleteToken = formData.get('delete_token')?.toString().trim();

    if (!reviewId || !/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i.test(reviewId)) {
        return new Response(JSON.stringify({ status: 'error', message: 'Invalid review reference.' }), { status: 400 });
    }
    if (!deleteToken || deleteToken.length !== 32) { // the token is 16 random bytes hex encoded meaning it's 32 characters in JS, wait, in PHP it was 32 bytes bin2hex = 64 characters!
        if (deleteToken?.length !== 64 && deleteToken?.length !== 32) { // just support both historical lengths
            return new Response(JSON.stringify({ status: 'error', message: 'Invalid delete token.' }), { status: 400 });
        }
    }

    const supabase = getSupabase();
    
    // Verify token
    const { data: reviews, error: fetchError } = await supabase
        .from('reviews')
        .select('id, delete_token')
        .eq('id', reviewId);

    if (fetchError || !reviews || reviews.length === 0) {
        return new Response(JSON.stringify({ status: 'error', message: 'Review not found or fetch failed.' }), { status: 404 });
    }

    if (reviews[0].delete_token !== deleteToken) {
        return new Response(JSON.stringify({ status: 'error', message: 'Unauthorized. You can only delete your own reviews.' }), { status: 403 });
    }

    // Delete from Supabase
    const { error: deleteError } = await supabase
        .from('reviews')
        .delete()
        .eq('id', reviewId);

    if (deleteError) {
        throw deleteError;
    }

    return new Response(JSON.stringify({ 
      status: 'success', 
      message: 'Review deleted successfully.'
    }), {
      status: 200, headers: { 'Content-Type': 'application/json' }
    });

  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: 'error', message: 'Failed to delete review.' }), {
      status: 500, headers: { 'Content-Type': 'application/json' }
    });
  }
};
