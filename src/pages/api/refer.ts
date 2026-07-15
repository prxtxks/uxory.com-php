import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';
import { Resend } from 'resend';
import crypto from 'node:crypto';

export const prerender = false;

const EMAIL_RE = /^\S+@\S+\.\S+$/;

const getSupabase = () => {
  const url = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
  const key = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
  if (!url || !key) throw new Error('Missing Supabase config');
  return createClient(url, key);
};

const json = (b: unknown, status = 200) =>
  new Response(JSON.stringify(b), { status, headers: { 'Content-Type': 'application/json' } });

export const POST: APIRoute = async ({ request, clientAddress }) => {
  try {
    const fd = await request.formData();

    // Honeypot
    if (fd.get('website')?.toString().trim()) return json({ status: 'success' });

    const referrerName = fd.get('referrer_name')?.toString().trim() || null;
    const referrerEmail = fd.get('referrer_email')?.toString().trim().toLowerCase();
    const clientName = fd.get('client_name')?.toString().trim() || null;
    const clientEmail = fd.get('client_email')?.toString().trim().toLowerCase();
    const message = fd.get('message')?.toString().trim() || null;

    if (!referrerEmail || !EMAIL_RE.test(referrerEmail)) {
      return json({ status: 'error', message: 'Please enter your valid email.' }, 400);
    }
    if (!clientEmail || !EMAIL_RE.test(clientEmail)) {
      return json({ status: 'error', message: "Please enter your referral's valid email." }, 400);
    }
    if (referrerEmail === clientEmail) {
      return json({ status: 'error', message: "You can't refer yourself." }, 400);
    }

    const supabase = getSupabase();
    const salt = import.meta.env.RECAPTCHA_SECRET || process.env.RECAPTCHA_SECRET || 'salt';
    const ipHash = crypto.createHash('md5').update((clientAddress || '0.0.0.0') + salt).digest('hex');

    const { error } = await supabase.from('referrals').insert({
      referrer_email: referrerEmail,
      referrer_name: referrerName,
      client_email: clientEmail,
      client_name: clientName,
      message,
      ip_hash: ipHash,
    });
    if (error) throw error;

    // Notify the team (best-effort)
    const resendKey = import.meta.env.RESEND_API_KEY || process.env.RESEND_API_KEY;
    if (resendKey) {
      const resend = new Resend(resendKey);
      resend.emails
        .send({
          from: 'Uxory Referrals <referrals@uxory.in>',
          to: 'uxoryllc@gmail.com',
          subject: `New referral from ${referrerEmail}`,
          html: `<p><strong>Referrer:</strong> ${referrerName || ''} &lt;${referrerEmail}&gt;</p>
                 <p><strong>Referred client:</strong> ${clientName || ''} &lt;${clientEmail}&gt;</p>
                 <p><strong>Message:</strong> ${message || '-'}</p>`,
        })
        .catch((e) => console.error('Resend referral notify failed:', e));
    }

    return json({ status: 'success', message: 'Referral submitted! We’ll take it from here.' }, 201);
  } catch (e) {
    console.error('Refer API error:', e);
    return json({ status: 'error', message: 'Something went wrong. Please try again.' }, 500);
  }
};
