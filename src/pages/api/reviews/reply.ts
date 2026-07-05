import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';
import crypto from 'node:crypto';

export const prerender = false;

const getSupabase = () => {
    const supabaseUrl = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
    const supabaseKey = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
    if (!supabaseUrl || !supabaseKey) throw new Error("Missing Supabase Variables");
    return createClient(supabaseUrl, supabaseKey);
};

export const POST: APIRoute = async ({ request, clientAddress }) => {
  try {
    const formData = await request.formData();
    
    // Honeypot
    const honeypot = formData.get('website')?.toString().trim();
    if (honeypot) {
      return new Response(JSON.stringify({ status: 'success', message: 'Reply posted successfully!' }), {
        status: 200, headers: { 'Content-Type': 'application/json' }
      });
    }

    // CAPTCHA check
    const recaptchaSecret = import.meta.env.RECAPTCHA_SECRET || process.env.RECAPTCHA_SECRET;
    const recaptchaResponse = formData.get('g-recaptcha-response')?.toString();
    if (recaptchaResponse && recaptchaSecret) {
      const captchaVerify = await fetch('https://www.google.com/recaptcha/api/siteverify', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `secret=${recaptchaSecret}&response=${recaptchaResponse}`
      });
      const captchaData = await captchaVerify.json();
      if (!captchaData.success) {
        return new Response(JSON.stringify({ status: 'error', message: 'CAPTCHA verification failed.' }), {
          status: 400, headers: { 'Content-Type': 'application/json' }
        });
      }
    }

    // Input Validation
    const reviewId = formData.get('review_id')?.toString().trim();
    const authorName = formData.get('author_name')?.toString().trim();
    const companyName = formData.get('company_name')?.toString().trim();
    const replyText = formData.get('reply_text')?.toString().trim();

    if (!reviewId || !/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i.test(reviewId)) {
      return new Response(JSON.stringify({ status: 'error', message: 'Invalid review reference.' }), { status: 400 });
    }
    if (!authorName || authorName.length > 100) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a valid name (max 100 characters).' }), { status: 400 });
    }
    if (companyName && companyName.length > 100) {
      return new Response(JSON.stringify({ status: 'error', message: 'Company name must be under 100 characters.' }), { status: 400 });
    }
    if (!replyText || replyText.length > 1000) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a reply (max 1000 characters).' }), { status: 400 });
    }

    // Supabase Insert Data
    const salt = recaptchaSecret || 'default_salt';
    const ipHash = crypto.createHash('md5').update((clientAddress || '127.0.0.1') + salt).digest('hex');

    const supabase = getSupabase();
    const { data: newReply, error } = await supabase
      .from('review_replies')
      .insert({
        review_id: reviewId,
        author_name: authorName,
        company_name: companyName || null,
        reply_text: replyText,
        ip_hash: ipHash
      })
      .select()
      .single();

    if (error) throw error;

    return new Response(JSON.stringify({ 
      status: 'success', 
      message: 'Reply posted successfully!',
      reply: newReply
    }), {
      status: 201, headers: { 'Content-Type': 'application/json' }
    });

  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: 'error', message: 'Failed to post reply. Please try again.' }), {
      status: 500, headers: { 'Content-Type': 'application/json' }
    });
  }
};
