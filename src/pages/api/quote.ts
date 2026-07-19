import type { APIRoute } from 'astro';
import { createClient } from '@supabase/supabase-js';
import crypto from 'node:crypto';
import { Resend } from 'resend';
import { estimate, type QuoteAnswers, type Category } from '../../lib/pricing/engine';
import type { Region } from '../../lib/pricing/rateCard';
import { getLlmAdjustment } from '../../lib/quoteLlm';
import { quoteTemplate } from '../../lib/emailTemplates';

export const prerender = false;

const EMAIL_RE = /^\S+@\S+\.\S+$/;
const CATEGORIES: Category[] = ['website', 'ecommerce', 'mobile', 'webapp', 'ai_bot', 'automation', 'custom'];
const CATEGORY_LABELS: Record<Category, string> = {
  website: 'website',
  ecommerce: 'e-commerce store',
  mobile: 'mobile app',
  webapp: 'web app',
  ai_bot: 'AI assistant',
  automation: 'automation',
  custom: 'project',
};

export const POST: APIRoute = async ({ request, clientAddress }) => {
  try {
    const supabaseUrl = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
    const supabaseKey = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
    if (!supabaseUrl || !supabaseKey) {
      console.error('Missing Supabase env vars.');
      return json({ status: 'error', message: 'Server not configured.' }, 500);
    }

    const body = await request.json().catch(() => null);
    if (!body) return json({ status: 'error', message: 'Invalid request.' }, 400);

    // Honeypot - hidden field must stay empty
    if (typeof body.website === 'string' && body.website.trim() !== '') {
      return json({ status: 'success', message: 'Quote sent!' }, 200);
    }

    // ── Validate ──
    const region: Region = body.region === 'IN' ? 'IN' : 'GLOBAL';
    const answers = (body.answers ?? {}) as QuoteAnswers;
    if (!CATEGORIES.includes(answers.category)) {
      return json({ status: 'error', message: 'Please pick a service category.' }, 400);
    }
    const name = String(body.contact?.name ?? '').trim().slice(0, 100);
    const email = String(body.contact?.email ?? '').trim().slice(0, 200);
    const company = String(body.contact?.company ?? '').trim().slice(0, 150) || null;
    const phone = String(body.contact?.phone ?? '').trim().slice(0, 30) || null;
    const comment = String(body.comment ?? '').trim().slice(0, 1500) || null;
    if (name.length < 2) return json({ status: 'error', message: 'Please enter your name.' }, 400);
    if (!EMAIL_RE.test(email)) return json({ status: 'error', message: 'Please enter a valid email.' }, 400);
    if (answers.category === 'custom' && (answers.description?.trim().length ?? 0) < 60) {
      return json({ status: 'error', message: 'Please describe your project (60+ characters).' }, 400);
    }

    // Bound numeric inputs (defense against absurd payloads)
    answers.extraPages = clampNum(answers.extraPages, 0, 200);
    answers.productCount = clampNum(answers.productCount, 0, 100000);
    answers.workflowCount = clampNum(answers.workflowCount, 1, 200);
    answers.botLanguages = clampNum(answers.botLanguages, 1, 30);

    // Sanitize web-app modules: cap count and shape each entry. The engine
    // also clamps per-module hours and the running total, but we never want
    // an unbounded array reaching it.
    if (Array.isArray(answers.appModules)) {
      answers.appModules = answers.appModules
        .filter((m) => m && typeof m.label === 'string')
        .slice(0, 40)
        .map((m) => ({ label: m.label.slice(0, 120), hours: clampNum(m.hours, 0, 90) ?? 0 }));
    }

    // ── LLM enhancer (clamped, silent fallback) ──
    // Web apps already carry explicit module scope from the AI scoper, so the
    // generic hours nudge would double-count; skip it for that category.
    let llmPct = 0;
    let llmNotes: string[] = [];
    let llmUsed = false;
    if (answers.category !== 'webapp' && (answers.category === 'custom' || comment)) {
      const adj = await getLlmAdjustment({
        category: answers.category,
        answersSummary: JSON.stringify({ ...answers, description: undefined }),
        description: answers.description,
        comment: comment ?? undefined,
      });
      if (adj) {
        llmPct = adj.pct;
        llmNotes = adj.notes;
        llmUsed = true;
      }
    }

    // ── Server-side recompute (source of truth; never trust client math) ──
    const quote = estimate(answers, region, llmPct);

    // ── Persist ──
    const salt = process.env.RECAPTCHA_SECRET || import.meta.env.RECAPTCHA_SECRET || 'default_salt';
    const ipHash = crypto.createHash('md5').update((clientAddress || '127.0.0.1') + salt).digest('hex');
    const supabase = createClient(supabaseUrl, supabaseKey);
    const { error: dbError } = await supabase.from('quote_requests').insert({
      category: answers.category,
      region,
      currency: quote.currency,
      answers: answers as any,
      hours: quote.hours,
      price_low: quote.low,
      price_high: quote.high,
      line_items: quote.lineItems as any,
      comment,
      llm_used: llmUsed,
      name,
      email,
      company,
      phone,
      ip_hash: ipHash,
    });
    if (dbError) throw dbError;

    // ── Emails (best-effort; the quote itself already succeeded) ──
    const resendKey = import.meta.env.RESEND_API_KEY || process.env.RESEND_API_KEY;
    if (resendKey) {
      const locale = region === 'IN' ? 'en-IN' : 'en-US';
      const sym = quote.currency === 'INR' ? '₹' : '$';
      const fmt = (n: number) => sym + Math.round(n).toLocaleString(locale);
      const resend = new Resend(resendKey);
      try {
        // Owner notification - full detail
        await resend.emails.send({
          from: 'Uxory Quotes <quotes@uxory.in>',
          to: 'uxoryllc@gmail.com',
          subject: `New quote: ${CATEGORY_LABELS[answers.category]} · ${fmt(quote.low)}–${fmt(quote.high)} · ${name}`,
          html: `<h2>New Instant Estimate lead</h2>
            <p><strong>${name}</strong> (${email})${company ? ` · ${company}` : ''}${phone ? ` · ${phone}` : ''}</p>
            <p><strong>Category:</strong> ${answers.category} · <strong>Region:</strong> ${region} · <strong>Hours:</strong> ${quote.hours}</p>
            <p><strong>Range:</strong> ${fmt(quote.low)} – ${fmt(quote.high)}${quote.flooredTo ? ' (floored to package)' : ''}</p>
            ${llmUsed ? `<p><strong>LLM adjustment:</strong> ${llmPct}% · notes: ${llmNotes.join('; ') || '-'}</p>` : '<p>LLM: not used</p>'}
            ${comment ? `<p><strong>Client comment:</strong> ${escapeHtml(comment)}</p>` : ''}
            ${answers.description ? `<p><strong>Description:</strong> ${escapeHtml(answers.description)}</p>` : ''}
            <h3>Line items</h3>
            <ul>${quote.lineItems.map((i) => `<li>${i.label}${i.amount != null ? ` - ${fmt(i.amount)}` : ''}${i.note ? ` (${i.note})` : ''}</li>`).join('')}</ul>
            <h3>Raw answers</h3>
            <pre style="font-size:12px">${escapeHtml(JSON.stringify(answers, null, 2))}</pre>`,
        });

        // Client branded quote
        await resend.emails.send({
          from: 'Uxory <quotes@uxory.in>',
          to: email,
          subject: `Your Uxory estimate: ${fmt(quote.low)} – ${fmt(quote.high)}`,
          html: quoteTemplate({
            name,
            categoryLabel: CATEGORY_LABELS[answers.category],
            lowFormatted: fmt(quote.low),
            highFormatted: fmt(quote.high),
            lineRows: quote.lineItems.map((i) => ({
              label: i.label,
              amount: i.amount != null ? fmt(i.amount) : null,
              note: i.note,
            })),
            refined: llmUsed && llmPct !== 0,
          }),
        });
      } catch (e) {
        console.error('Quote email failed (non-blocking):', e);
      }
    }

    return json(
      {
        status: 'success',
        message: 'Quote sent!',
        quote: { low: quote.low, high: quote.high, currency: quote.currency, llmUsed },
      },
      201
    );
  } catch (error) {
    console.error('Quote API Error:', error);
    return json({ status: 'error', message: 'Something went wrong. Please try again.' }, 500);
  }
};

function clampNum(v: unknown, min: number, max: number): number | undefined {
  if (v === undefined || v === null) return undefined;
  const n = Number(v);
  if (!Number.isFinite(n)) return undefined;
  return Math.max(min, Math.min(max, n));
}

function escapeHtml(s: string): string {
  return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

function json(body: unknown, status: number) {
  return new Response(JSON.stringify(body), {
    status,
    headers: { 'Content-Type': 'application/json' },
  });
}
