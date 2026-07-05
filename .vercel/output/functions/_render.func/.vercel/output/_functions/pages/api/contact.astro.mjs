import { createClient } from '@supabase/supabase-js';
import { Resend } from 'resend';
import { c as contactTemplate } from '../../chunks/emailTemplates_Ck0GzzB3.mjs';
export { renderers } from '../../renderers.mjs';

const prerender = false;
const POST = async ({ request }) => {
  try {
    const resendKey = undefined                               || process.env.RESEND_API_KEY;
    const supabaseUrl = undefined                             || process.env.SUPABASE_URL;
    const supabaseKey = undefined                                     || process.env.SUPABASE_SERVICE_KEY;
    const recaptchaSecret = undefined                                 || process.env.RECAPTCHA_SECRET;
    if (!resendKey || !supabaseUrl || !supabaseKey) {
      console.error("Missing environment variables.");
      return new Response(JSON.stringify({ status: "error", message: "Internal Server Error" }), { status: 500 });
    }
    const resend = new Resend(resendKey);
    const supabase = createClient(supabaseUrl, supabaseKey);
    const formData = await request.formData();
    const honeypot = formData.get("website")?.toString().trim();
    if (honeypot) {
      return new Response(JSON.stringify({ status: "success", message: "Message sent successfully!" }), {
        status: 200,
        headers: { "Content-Type": "application/json" }
      });
    }
    const name = formData.get("name")?.toString().trim();
    const email = formData.get("email")?.toString().trim();
    const phone = formData.get("phone")?.toString().trim();
    const company = formData.get("company")?.toString().trim();
    const message = formData.get("Message")?.toString().trim();
    if (!name || !phone || !email || !/^\\S+@\\S+\\.\\S+$/.test(email)) {
      return new Response(JSON.stringify({ status: "error", message: "Invalid form data." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
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
    const adminHtml = `
      <h2>New Contact Message</h2>
      <p><strong>Name:</strong> ${name}</p>
      <p><strong>Email:</strong> ${email}</p>
      <p><strong>Phone:</strong> ${phone}</p>
      <p><strong>Company:</strong> ${company || "N/A"}</p>
      <p><strong>Message:</strong><br>${message || "N/A"}</p>
    `;
    const adminResult = await resend.emails.send({
      from: "Uxory Contact <onboarding@resend.dev>",
      to: "uxoryllc@gmail.com",
      subject: "New Contact Form Submission",
      html: adminHtml
    });
    if (adminResult.error) {
      console.error("Resend Error:", adminResult.error);
      return new Response(JSON.stringify({ status: "error", message: "Failed to send message. Please try again later." }), {
        status: 500,
        headers: { "Content-Type": "application/json" }
      });
    }
    await supabase.from("leads").insert({ name, email, phone, company, message });
    const autoReplyHtml = contactTemplate ? contactTemplate : "Thank you for contacting us!";
    await resend.emails.send({
      from: "Uxory Team <onboarding@resend.dev>",
      to: email,
      subject: "Thank You for Contacting Uxory",
      html: autoReplyHtml
    });
    return new Response(JSON.stringify({ status: "success", message: "Message sent successfully! We'll get back to you shortly." }), {
      status: 200,
      headers: { "Content-Type": "application/json" }
    });
  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: "error", message: "Internal Server Error" }), {
      status: 500,
      headers: { "Content-Type": "application/json" }
    });
  }
};

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  POST,
  prerender
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
