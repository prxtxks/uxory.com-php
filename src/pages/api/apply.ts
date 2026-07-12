import type { APIRoute } from 'astro';
import { Resend } from 'resend';
import { applicationTemplate } from './emailTemplates';

export const prerender = false;

export const POST: APIRoute = async ({ request }) => {
  try {
    const resendKey = import.meta.env.RESEND_API_KEY || process.env.RESEND_API_KEY;
    const recaptchaSecret = import.meta.env.RECAPTCHA_SECRET || process.env.RECAPTCHA_SECRET;

    if (!resendKey) {
      return new Response(JSON.stringify({ status: 'error', message: 'Internal Server Error' }), { status: 500 });
    }

    const resend = new Resend(resendKey);
    const formData = await request.formData();
    
    // Honeypot
    const honeypot = formData.get('website')?.toString().trim();
    if (honeypot) {
      return new Response(JSON.stringify({ status: 'success', message: 'Application submitted successfully!' }), {
        status: 200, headers: { 'Content-Type': 'application/json' }
      });
    }

    const name = formData.get('name')?.toString().trim();
    const email = formData.get('email')?.toString().trim();
    const position = formData.get('position')?.toString().trim() || 'General Application';

    if (!name || name.length < 2) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a valid name.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }

    if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
      return new Response(JSON.stringify({ status: 'error', message: 'Please enter a valid email address.' }), {
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

    // File validation
    const resume = formData.get('resume') as File | null;
    if (!resume || resume.size === 0) {
      return new Response(JSON.stringify({ status: 'error', message: 'Resume upload failed. Please try again.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }

    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/png', 'image/jpeg'];
    if (!allowedTypes.includes(resume.type)) {
      return new Response(JSON.stringify({ status: 'error', message: 'Invalid file type. Please upload PDF, DOC, DOCX, PNG, or JPG.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }

    if (resume.size > 5 * 1024 * 1024) {
      return new Response(JSON.stringify({ status: 'error', message: 'File too large. Maximum size is 5MB.' }), {
        status: 400, headers: { 'Content-Type': 'application/json' }
      });
    }

    // Convert file to base64
    const arrayBuffer = await resume.arrayBuffer();
    const buffer = Buffer.from(arrayBuffer);
    
    let adminHtml = `
        <h2>New Job Application Received</h2>
        <p><strong>Position:</strong> ${position}</p>
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Resume:</strong> Attached</p>
    `;

    const adminResult = await resend.emails.send({
      from: 'Uxory Careers <onboarding@resend.dev>',
      to: 'uxoryllc@gmail.com',
      subject: `New Job Application: ${position}`,
      html: adminHtml,
      attachments: [
        {
          filename: resume.name,
          content: buffer
        }
      ]
    });

    if (adminResult.error) {
      console.error("Resend Error:", adminResult.error);
      return new Response(JSON.stringify({ status: 'error', message: 'Failed to send application. Please try again later.' }), {
        status: 500, headers: { 'Content-Type': 'application/json' }
      });
    }

    let userHtml = applicationTemplate ? applicationTemplate : `
        <h2>Thank You for Your Application, {NAME}!</h2>
        <p>We have received your application for the <strong>{POSITION}</strong> position.</p>
        <p>Our team will review your application and get back to you soon.</p>
        <br>
        <p>Best regards,<br>Uxory Team</p>
    `;
    userHtml = userHtml.replace(/{NAME}/g, name).replace(/{POSITION}/g, position);

    await resend.emails.send({
      from: 'Uxory Careers <onboarding@resend.dev>',
      to: email,
      subject: 'Application Received - Uxory',
      html: userHtml,
    });

    return new Response(JSON.stringify({ status: 'success', message: "Application submitted successfully! We'll review your application and get back to you soon." }), {
      status: 200, headers: { 'Content-Type': 'application/json' }
    });

  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: 'error', message: 'Internal Server Error' }), {
      status: 500, headers: { 'Content-Type': 'application/json' }
    });
  }
};
