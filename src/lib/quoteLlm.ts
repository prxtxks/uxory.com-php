/**
 * LLM enhancer for the Instant Estimate - Gemini as a bounded advisor.
 *
 * The model NEVER prices anything. It returns a percentage adjustment to the
 * deterministic engine's hours, which we clamp to LLM_ADJUSTMENT_CLAMP before
 * use. Any failure (quota, network, bad JSON) returns null and the caller
 * proceeds with the unadjusted deterministic quote.
 */
import { LLM_ADJUSTMENT_CLAMP } from './pricing/rateCard';

const MODEL = import.meta.env.GEMINI_MODEL || process.env.GEMINI_MODEL || 'gemini-2.0-flash';

export interface LlmAdjustment {
  pct: number; // clamped percentage
  notes: string[];
}

export async function getLlmAdjustment(input: {
  category: string;
  answersSummary: string;
  description?: string;
  comment?: string;
}): Promise<LlmAdjustment | null> {
  const apiKey = import.meta.env.GEMINI_API_KEY || process.env.GEMINI_API_KEY;
  if (!apiKey) return null;
  if (!input.description && !input.comment) return null;

  const prompt = `You are a senior software-agency estimator. A deterministic pricing engine already produced a baseline estimate for this project. Your ONLY job is to judge whether the client's free-text adds scope the structured answers missed (or removes some), and by roughly what percentage the effort (hours) should shift.

Category: ${input.category}
Structured answers: ${input.answersSummary}
${input.description ? `Client project description: ${input.description}` : ''}
${input.comment ? `Client extra notes: ${input.comment}` : ''}

Rules:
- hoursAdjustmentPct: integer between ${LLM_ADJUSTMENT_CLAMP.min} and ${LLM_ADJUSTMENT_CLAMP.max}. 0 if the text adds nothing material.
- Be conservative; most notes warrant 0-15.
- notes: max 3 short phrases naming the scope you detected (for the agency's eyes, not the client's).
Respond with JSON only.`;

  try {
    const controller = new AbortController();
    const timer = setTimeout(() => controller.abort(), 8000);
    const res = await fetch(
      `https://generativelanguage.googleapis.com/v1beta/models/${MODEL}:generateContent?key=${apiKey}`,
      {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        signal: controller.signal,
        body: JSON.stringify({
          contents: [{ role: 'user', parts: [{ text: prompt }] }],
          generationConfig: {
            temperature: 0.2,
            responseMimeType: 'application/json',
            responseSchema: {
              type: 'OBJECT',
              properties: {
                hoursAdjustmentPct: { type: 'INTEGER' },
                notes: { type: 'ARRAY', items: { type: 'STRING' } },
              },
              required: ['hoursAdjustmentPct'],
            },
          },
        }),
      }
    );
    clearTimeout(timer);
    if (!res.ok) return null;
    const data = await res.json();
    const text = data?.candidates?.[0]?.content?.parts?.[0]?.text;
    if (!text) return null;
    const parsed = JSON.parse(text);
    const raw = Number(parsed.hoursAdjustmentPct);
    if (!Number.isFinite(raw)) return null;
    const pct = Math.max(LLM_ADJUSTMENT_CLAMP.min, Math.min(LLM_ADJUSTMENT_CLAMP.max, Math.round(raw)));
    const notes = Array.isArray(parsed.notes) ? parsed.notes.slice(0, 3).map(String) : [];
    return { pct, notes };
  } catch {
    return null; // graceful: quota, timeout, parse - all fall back silently
  }
}
