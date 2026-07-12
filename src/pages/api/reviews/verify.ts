import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';
import crypto from 'node:crypto';
import { hashCode } from '../../../lib/otp';

export const prerender = false;

const EMAIL_RE = /^\S+@\S+\.\S+$/;

const json = (b: unknown, status = 200) =>
  new Response(JSON.stringify(b), { status, headers: { 'Content-Type': 'application/json' } });

const getSupabase = () => {
  const url = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
  const key = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
  if (!url || !key) throw new Error('Missing Supabase config');
  return createClient(url, key);
};

/**
 * POST { email } → emails a 6-digit code that must accompany the review.
 * Makes every review traceable to a verified inbox.
 */
export const POST: APIRoute = async ({ request }) => {
  try {
    const fd = await request.formData();

    // Honeypot
    if (fd.get('website')?.toString().trim()) return json({ status: 'success', message: 'Code sent!' });

    const email = fd.get('email')?.toString().trim().toLowerCase();
    if (!email || !EMAIL_RE.test(email) || email.length > 200) {
      return json({ status: 'error', message: 'Please enter a valid email address.' }, 400);
    }

    const supabase = getSupabase();

    // Rate limit: one code per email per 60s
    const { data: existing } = await supabase
      .from('review_otps')
      .select('created_at')
      .eq('email', email)
      .maybeSingle();
    if (existing && Date.now() - new Date(existing.created_at).getTime() < 60_000) {
      return json({ status: 'error', message: 'Code already sent — check your inbox (you can resend in a minute).' }, 429);
    }

    const code = crypto.randomInt(100000, 1000000).toString();
    const { error } = await supabase.from('review_otps').upsert({
      email,
      code_hash: hashCode(code),
      expires_at: new Date(Date.now() + 10 * 60_000).toISOString(),
      attempts: 0,
      created_at: new Date().toISOString(),
    });
    if (error) throw error;

    const resendKey = import.meta.env.RESEND_API_KEY || process.env.RESEND_API_KEY;
    if (resendKey) {
      const { Resend } = await import('resend');
      const resend = new Resend(resendKey);
      const { error: mailErr } = await resend.emails.send({
        from: 'Uxory Reviews <onboarding@resend.dev>',
        to: email,
        subject: `${code} is your Uxory review code`,
        html: `<p>Hi,</p>
          <p>Your verification code for posting a review on Uxory is:</p>
          <p style="font-size:28px;font-weight:bold;letter-spacing:6px;color:#0aa89e">${code}</p>
          <p>It expires in 10 minutes. If you didn't request this, you can ignore this email.</p>
          <p>— Uxory (uxory.in)</p>`,
      });
      if (mailErr) {
        console.error('OTP email failed:', mailErr);
        return json({ status: 'error', message: 'Could not send the code. Please try again.' }, 500);
      }
      return json({ status: 'success', message: 'Code sent! Check your inbox (and spam).' });
    }

    // No email provider configured:
    // dev → return the code so the flow is testable locally.
    // prod → fail loudly rather than silently un-verifiable.
    if (import.meta.env.DEV) {
      return json({ status: 'success', message: 'DEV: no RESEND_API_KEY — code returned for testing.', dev_code: code });
    }
    console.error('RESEND_API_KEY missing in production — cannot send review OTP.');
    return json({ status: 'error', message: 'Verification is temporarily unavailable. Please try later.' }, 503);
  } catch (e) {
    console.error('Review OTP error:', e);
    return json({ status: 'error', message: 'Something went wrong. Please try again.' }, 500);
  }
};
