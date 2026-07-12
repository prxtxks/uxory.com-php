import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';
import { Resend } from 'resend';
import { subscribeTemplate } from './emailTemplates';

export const prerender = false;

export const POST: APIRoute = async ({ request }) => {
  try {
    const resendKey = import.meta.env.RESEND_API_KEY || process.env.RESEND_API_KEY;
    const supabaseUrl = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
    const supabaseKey = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
    const recaptchaSecret = import.meta.env.RECAPTCHA_SECRET || process.env.RECAPTCHA_SECRET;

    if (!resendKey || !supabaseUrl || !supabaseKey) {
      return new Response(JSON.stringify({ status: 'error', message: 'Internal Server Error' }), { status: 500 });
    }

    const resend = new Resend(resendKey);
    const supabase = createClient(supabaseUrl, supabaseKey);

    const formData = await request.formData();
    
    // Honeypot
    const honeypot = formData.get('website')?.toString().trim();
    if (honeypot) {
      return new Response(JSON.stringify({ status: 'success', message: 'Subscription successful!' }), {
        status: 200, headers: { 'Content-Type': 'application/json' }
      });
    }

    const email = formData.get('email')?.toString().trim();
    
    if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
      return new Response(JSON.stringify({ status: 'error', message: 'Invalid email address.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }

    // CAPTCHA check
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

    // Check supabase
    const { data: existing, error: checkError } = await supabase
      .from('subscribers')
      .select('id, status')
      .eq('email', email)
      .limit(1);

    if (checkError) throw checkError;

    if (existing && existing.length > 0) {
      const currentStatus = existing[0].status || 'inactive';
      if (currentStatus === 'active') {
        return new Response(JSON.stringify({ status: 'success', message: 'You are already subscribed.' }), {
          status: 200, headers: { 'Content-Type': 'application/json' }
        });
      } else {
        // Resubscribe
        const { error: updateError } = await supabase
          .from('subscribers')
          .update({ status: 'active', subscribed_at: new Date().toISOString(), unsubscribed_at: null })
          .eq('email', email);
        if (updateError) throw updateError;
      }
    } else {
      // New insert
      const { error: insertError } = await supabase
        .from('subscribers')
        .insert({ email, status: 'active' });
      if (insertError) throw insertError;
    }

    // Send emails
    const adminHtml = `<h2>New Newsletter Subscriber: ${email}</h2>`;
    await resend.emails.send({
      from: 'Uxory Subs <onboarding@resend.dev>',
      to: 'uxoryllc@gmail.com',
      subject: 'New Newsletter Subscription',
      html: adminHtml,
    });

    const unsubscribeLink = `https://uxory.in/unsubscribe?email=${encodeURIComponent(email)}`;
    let userHtml = subscribeTemplate ? subscribeTemplate : 'Thanks for subscribing!';
    userHtml = userHtml.replace('{UNSUBSCRIBE_LINK}', unsubscribeLink);

    await resend.emails.send({
      from: 'Uxory Team <onboarding@resend.dev>',
      to: email,
      subject: 'Welcome to Uxory Newsletter',
      html: userHtml,
    });

    return new Response(JSON.stringify({ status: 'success', message: 'Successfully Subscribed!' }), {
      status: 200, headers: { 'Content-Type': 'application/json' }
    });

  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: 'error', message: 'Internal Server Error' }), {
      status: 500, headers: { 'Content-Type': 'application/json' }
    });
  }
};
