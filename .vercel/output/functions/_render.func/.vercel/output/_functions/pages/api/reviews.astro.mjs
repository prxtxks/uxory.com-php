import { createClient } from '@supabase/supabase-js';
import crypto from 'node:crypto';
export { renderers } from '../../renderers.mjs';

const prerender = false;
const getSupabase = () => {
  const supabaseUrl = process.env.SUPABASE_URL;
  const supabaseKey = process.env.SUPABASE_SERVICE_KEY;
  if (!supabaseUrl || !supabaseKey) throw new Error("Missing Supabase Variables");
  return createClient(supabaseUrl, supabaseKey);
};
const GET = async () => {
  try {
    const supabase = getSupabase();
    const { data: reviews, error } = await supabase.from("reviews").select("id,author_name,company_name,rating,review_text,created_at,review_replies(id,review_id,author_name,company_name,reply_text,created_at)").order("created_at", { ascending: false });
    if (error) throw error;
    const formattedReviews = reviews || [];
    const total = formattedReviews.length;
    let sum = 0;
    formattedReviews.forEach((r) => {
      sum += r.rating;
      if (r.review_replies && Array.isArray(r.review_replies)) {
        r.review_replies.sort((a, b) => new Date(a.created_at).getTime() - new Date(b.created_at).getTime());
      }
    });
    const avgRating = total > 0 ? (sum / total).toFixed(1) : 0;
    return new Response(JSON.stringify({
      status: "success",
      reviews: formattedReviews,
      stats: { total, average_rating: Number(avgRating) }
    }), {
      status: 200,
      headers: { "Content-Type": "application/json" }
    });
  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: "error", message: "Failed to fetch reviews." }), {
      status: 500,
      headers: { "Content-Type": "application/json" }
    });
  }
};
const POST = async ({ request, clientAddress }) => {
  try {
    const formData = await request.formData();
    const honeypot = formData.get("website")?.toString().trim();
    if (honeypot) {
      return new Response(JSON.stringify({ status: "success", message: "Review posted successfully!" }), {
        status: 200,
        headers: { "Content-Type": "application/json" }
      });
    }
    const recaptchaSecret = undefined                                 || process.env.RECAPTCHA_SECRET;
    const recaptchaResponse = formData.get("g-recaptcha-response")?.toString();
    if (recaptchaResponse && recaptchaSecret) {
      const captchaVerify = await fetch("https://www.google.com/recaptcha/api/siteverify", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `secret=${recaptchaSecret}&response=${recaptchaResponse}`
      });
      const captchaData = await captchaVerify.json();
      if (!captchaData.success) {
        return new Response(JSON.stringify({ status: "error", message: "CAPTCHA verification failed." }), {
          status: 400,
          headers: { "Content-Type": "application/json" }
        });
      }
    }
    const authorName = formData.get("author_name")?.toString().trim();
    const companyName = formData.get("company_name")?.toString().trim();
    const email = formData.get("email")?.toString().trim();
    const ratingStr = formData.get("rating")?.toString().trim();
    const rating = parseInt(ratingStr || "0", 10);
    const reviewText = formData.get("review_text")?.toString().trim();
    if (!authorName || authorName.length > 100) {
      return new Response(JSON.stringify({ status: "error", message: "Please enter a valid name (max 100 characters)." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
    if (companyName && companyName.length > 100) {
      return new Response(JSON.stringify({ status: "error", message: "Company name must be under 100 characters." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
    if (!email || !/^\\S+@\\S+\\.\\S+$/.test(email)) {
      return new Response(JSON.stringify({ status: "error", message: "Please enter a valid email address." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
    if (rating < 1 || rating > 5) {
      return new Response(JSON.stringify({ status: "error", message: "Please select a rating between 1 and 5." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
    if (!reviewText || reviewText.length > 2e3) {
      return new Response(JSON.stringify({ status: "error", message: "Please enter a review (max 2000 characters)." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
    const salt = recaptchaSecret || "default_salt";
    const ipHash = crypto.createHash("md5").update((clientAddress || "127.0.0.1") + salt).digest("hex");
    const deleteToken = crypto.randomBytes(16).toString("hex");
    const supabase = getSupabase();
    const { data: newReview, error } = await supabase.from("reviews").insert({
      author_name: authorName,
      company_name: companyName || null,
      email,
      rating,
      review_text: reviewText,
      delete_token: deleteToken,
      ip_hash: ipHash
    }).select().single();
    if (error) throw error;
    const safeReview = {
      id: newReview.id,
      author_name: newReview.author_name,
      company_name: newReview.company_name,
      rating: newReview.rating,
      review_text: newReview.review_text,
      created_at: newReview.created_at,
      review_replies: []
    };
    return new Response(JSON.stringify({
      status: "success",
      message: "Review posted successfully!",
      review: safeReview,
      delete_token: deleteToken
    }), {
      status: 201,
      headers: { "Content-Type": "application/json" }
    });
  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: "error", message: "Failed to post review. Please try again." }), {
      status: 500,
      headers: { "Content-Type": "application/json" }
    });
  }
};

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  GET,
  POST,
  prerender
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
