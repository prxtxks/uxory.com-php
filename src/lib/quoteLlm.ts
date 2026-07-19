/**
 * LLM enhancer for the Instant Estimate - Gemini as a bounded advisor.
 *
 * The model NEVER prices anything. It returns a percentage adjustment to the
 * deterministic engine's hours, which we clamp to LLM_ADJUSTMENT_CLAMP before
 * use. Any failure (quota, network, bad JSON) returns null and the caller
 * proceeds with the unadjusted deterministic quote.
 */
import { LLM_ADJUSTMENT_CLAMP, WEBAPP_MODULES, WEBAPP_MODULE_CLAMP } from './pricing/rateCard';

// gemini-flash-latest works on the current free tier; the older
// gemini-2.0-flash returns 429 (limit: 0) for newer keys and 2.5-flash is
// 404 "no longer available to new users". Override via GEMINI_MODEL if needed.
const MODEL = import.meta.env.GEMINI_MODEL || process.env.GEMINI_MODEL || 'gemini-flash-latest';

function getKey(): string | undefined {
  return import.meta.env.GEMINI_API_KEY || process.env.GEMINI_API_KEY;
}

async function callGemini(prompt: string, responseSchema: unknown, timeoutMs = 9000): Promise<any | null> {
  const apiKey = getKey();
  if (!apiKey) return null;
  try {
    const controller = new AbortController();
    const timer = setTimeout(() => controller.abort(), timeoutMs);
    const res = await fetch(
      `https://generativelanguage.googleapis.com/v1beta/models/${MODEL}:generateContent?key=${apiKey}`,
      {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        signal: controller.signal,
        body: JSON.stringify({
          contents: [{ role: 'user', parts: [{ text: prompt }] }],
          generationConfig: { temperature: 0.25, responseMimeType: 'application/json', responseSchema },
        }),
      }
    );
    clearTimeout(timer);
    if (!res.ok) return null;
    const data = await res.json();
    const text = data?.candidates?.[0]?.content?.parts?.[0]?.text;
    if (!text) return null;
    return JSON.parse(text);
  } catch {
    return null;
  }
}

// ─────────────────────────────────────────────────────────────
// Web-app scoper: turns a plain-language description (plus optional
// clarifying answers) into either a few follow-up questions or an itemized
// module breakdown. The model proposes HOURS per module; the engine prices
// them (hours × rate). Hours are clamped; the model never sees or sets money.
// ─────────────────────────────────────────────────────────────
export interface ScopeModule {
  label: string;
  hours: number;
}
export type WebappScope =
  | { mode: 'questions'; questions: string[] }
  | { mode: 'breakdown'; modules: ScopeModule[]; assumptions: string[] };

export async function getWebappScope(input: {
  description: string;
  hints?: string[]; // structured toggles the user ticked (e.g. "needs payments")
  answeredQuestions?: { q: string; a: string }[];
  forceBreakdown?: boolean;
}): Promise<WebappScope | null> {
  if (!getKey()) return null;

  const reference = WEBAPP_MODULES.map((m) => `- ${m.label} (~${m.hours}h, ${m.group})`).join('\n');
  const priorQa =
    input.answeredQuestions?.length
      ? input.answeredQuestions.map((x) => `Q: ${x.q}\nA: ${x.a}`).join('\n')
      : '(none yet)';

  const prompt = `You are a senior software-agency estimator scoping a CUSTOM WEB APPLICATION / SaaS build so it can be priced by hours.

Client description:
"""${input.description}"""

Structured hints the client selected: ${input.hints?.length ? input.hints.join(', ') : '(none)'}
Clarifying answers so far:
${priorQa}

Reference module library with typical hours (use these labels and hour norms where they fit; you may add a module not listed if the app clearly needs it):
${reference}

Decide ONE of two modes:
- "questions": ONLY if the description is too vague to scope and you have not already asked. Return up to 3 short, plain-language questions a non-technical founder can answer (who uses it, the core things they do, must-have integrations, rough scale). Never ask more than one round.
- "breakdown": produce the module list. Pick every module the app needs, give each a realistic hours value between ${WEBAPP_MODULE_CLAMP.min} and ${WEBAPP_MODULE_CLAMP.max} based on the described complexity, and add up to 4 short assumptions you made. Do not include generic "project setup" (already counted). Prefer breakdown once you have enough signal.

${input.forceBreakdown ? 'You MUST return mode "breakdown" now; do not ask more questions.' : ''}

Respond with JSON only.`;

  const parsed = await callGemini(prompt, {
    type: 'OBJECT',
    properties: {
      mode: { type: 'STRING', enum: ['questions', 'breakdown'] },
      questions: { type: 'ARRAY', items: { type: 'STRING' } },
      modules: {
        type: 'ARRAY',
        items: {
          type: 'OBJECT',
          properties: { label: { type: 'STRING' }, hours: { type: 'INTEGER' } },
          required: ['label', 'hours'],
        },
      },
      assumptions: { type: 'ARRAY', items: { type: 'STRING' } },
    },
    required: ['mode'],
  });
  if (!parsed) return null;

  if (parsed.mode === 'questions' && !input.forceBreakdown) {
    const questions = Array.isArray(parsed.questions)
      ? parsed.questions.slice(0, 3).map(String).filter(Boolean)
      : [];
    if (questions.length) return { mode: 'questions', questions };
    // fell through with no questions → treat as needing a breakdown
  }

  const modules: ScopeModule[] = Array.isArray(parsed.modules)
    ? parsed.modules
        .filter((m: any) => m && typeof m.label === 'string')
        .slice(0, 30)
        .map((m: any) => ({
          label: String(m.label).slice(0, 120),
          hours: Math.max(
            WEBAPP_MODULE_CLAMP.min,
            Math.min(WEBAPP_MODULE_CLAMP.max, Math.round(Number(m.hours) || WEBAPP_MODULE_CLAMP.min))
          ),
        }))
    : [];
  if (!modules.length) return null;
  const assumptions = Array.isArray(parsed.assumptions)
    ? parsed.assumptions.slice(0, 4).map(String).filter(Boolean)
    : [];
  return { mode: 'breakdown', modules, assumptions };
}

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
