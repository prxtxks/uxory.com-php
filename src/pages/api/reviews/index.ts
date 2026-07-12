import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';
import crypto from 'node:crypto';
import { hashCode } from '../../../lib/otp';
import { geocode } from '../../../lib/geo';

export const prerender = false;

// Shared Supabase client initialization
const getSupabase = () => {
    const supabaseUrl = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
    const supabaseKey = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
    if (!supabaseUrl || !supabaseKey) throw new Error("Missing Supabase Variables");
    return createClient(supabaseUrl, supabaseKey);
};

export const GET: APIRoute = async () => {
  try {
    const supabase = getSupabase();
    
    // Fetch reviews with review_replies natively through Supabase join (using their syntax)
    // The PHP did: ?select=id,author_name,company_name,rating,review_text,created_at,review_replies(...)
    const { data: reviews, error } = await supabase
      .from('reviews')
      .select('id,author_name,company_name,rating,review_text,created_at,verified,city,country,lat,lng,review_replies(id,review_id,author_name,company_name,reply_text,created_at)')
      .order('created_at', { ascending: false });

    if (error) throw error;

    const formattedReviews = reviews || [];
    
    // Calculate average rating
    const total = formattedReviews.length;
    let sum = 0;
    formattedReviews.forEach(r => {
        sum += r.rating;
        // Supabase JS doesn't support nested ordering cleanly in string selects, so we sort replies manually
        if (r.review_replies && Array.isArray(r.review_replies)) {
            r.review_replies.sort((a, b) => new Date(a.created_at).getTime() - new Date(b.created_at).getTime());
        }
    });

    const avgRating = total > 0 ? (sum / total).toFixed(1) : 0;

    return new Response(JSON.stringify({
      status: 'success',
      reviews: formattedReviews,
      stats: { total, average_rating: Number(avgRating) }
    }), {
      status: 200, headers: { 'Content-Type': 'application/json' }
    });
  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: 'error', message: 'Failed to fetch reviews.' }), {
      status: 500, headers: { 'Content-Type': 'application/json' }
    });
  }
};

export const POST: APIRoute = async ({ request, clientAddress }) => {
  try {
    const formData = await request.formData();
    
    // Honeypot
    const honeypot = formData.get('website')?.toString().trim();
    if (honeypot) {
      return new Response(JSON.stringify({ status: 'success', message: 'Review posted successfully!' }), {
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
    const authorName = formData.get('author_name')?.toString().trim();
    const companyName = formData.get('company_name')?.toString().trim();
    const email = formData.get('email')?.toString().trim();
    const ratingStr = formData.get('rating')?.toString().trim();
    const rating = parseInt(ratingStr || '0', 10);
    const reviewText = formData.get('review_text')?.toString().trim();

    if (!authorName || authorName.length > 100) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a valid name (max 100 characters).' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (companyName && companyName.length > 100) {
      return new Response(JSON.stringify({ status: 'error', message: 'Company name must be under 100 characters.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a valid email address.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (rating < 1 || rating > 5) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please select a rating between 1 and 5.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (!reviewText || reviewText.length > 2000) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a review (max 2000 characters).' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }

    const city = formData.get('city')?.toString().trim().slice(0, 80) || null;
    const country = formData.get('country')?.toString().trim().slice(0, 80) || null;
    const otp = formData.get('otp')?.toString().trim();

    const supabase = getSupabase();

    // --- Email OTP verification: every review is traceable to a real inbox ---
    if (!otp || !/^\d{6}$/.test(otp)) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter the 6-digit code we emailed you.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    const emailKey = email.toLowerCase();
    const { data: otpRow } = await supabase
      .from('review_otps')
      .select('code_hash,expires_at,attempts')
      .eq('email', emailKey)
      .maybeSingle();
    if (!otpRow) {
      return new Response(JSON.stringify({ status: 'error', message: 'No code found for this email — tap "Send code" first.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (new Date(otpRow.expires_at).getTime() < Date.now()) {
      await supabase.from('review_otps').delete().eq('email', emailKey);
      return new Response(JSON.stringify({ status: 'error', message: 'That code expired — request a new one.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (otpRow.attempts >= 5) {
      await supabase.from('review_otps').delete().eq('email', emailKey);
      return new Response(JSON.stringify({ status: 'error', message: 'Too many attempts — request a new code.' }), {
        status: 429, headers: { 'Content-Type': 'application/json' }
      });
    }
    if (otpRow.code_hash !== hashCode(otp)) {
      await supabase.from('review_otps').update({ attempts: otpRow.attempts + 1 }).eq('email', emailKey);
      return new Response(JSON.stringify({ status: 'error', message: "That code doesn't match — double-check and try again." }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }
    // Code is good — consume it (single use).
    await supabase.from('review_otps').delete().eq('email', emailKey);

    // Resolve location for the globe (offline lookup; null is fine)
    const coords = geocode(city, country, emailKey);

    // Supabase Insert Data
    const salt = recaptchaSecret || 'default_salt';
    const ipHash = crypto.createHash('md5').update((clientAddress || '127.0.0.1') + salt).digest('hex');
    const deleteToken = crypto.randomBytes(16).toString('hex');

    const { data: newReview, error } = await supabase
      .from('reviews')
      .insert({
        author_name: authorName,
        company_name: companyName || null,
        email,
        rating,
        review_text: reviewText,
        delete_token: deleteToken,
        ip_hash: ipHash,
        verified: true,
        city,
        country,
        lat: coords ? coords[0] : null,
        lng: coords ? coords[1] : null
      })
      .select()
      .single();

    if (error) throw error;

    // Filter out sensitive fields
    const safeReview = {
        id: newReview.id,
        author_name: newReview.author_name,
        company_name: newReview.company_name,
        rating: newReview.rating,
        review_text: newReview.review_text,
        created_at: newReview.created_at,
        verified: newReview.verified,
        city: newReview.city,
        country: newReview.country,
        lat: newReview.lat,
        lng: newReview.lng,
        review_replies: []
    };

    return new Response(JSON.stringify({ 
      status: 'success', 
      message: 'Review posted successfully!',
      review: safeReview,
      delete_token: deleteToken
    }), {
      status: 201, headers: { 'Content-Type': 'application/json' }
    });

  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: 'error', message: 'Failed to post review. Please try again.' }), {
      status: 500, headers: { 'Content-Type': 'application/json' }
    });
  }
};
