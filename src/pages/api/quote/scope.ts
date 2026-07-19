import type { APIRoute } from 'astro';
import { getWebappScope } from '../../../lib/quoteLlm';
import { HOURLY_RATE, type Region } from '../../../lib/pricing/rateCard';

export const prerender = false;

const json = (b: unknown, status = 200) =>
  new Response(JSON.stringify(b), { status, headers: { 'Content-Type': 'application/json' } });

/**
 * POST { description, hints?, region?, answeredQuestions?, forceBreakdown? }
 *
 * Returns one of:
 *   { mode: 'questions', questions: string[] }
 *   { mode: 'breakdown', modules: [{ label, hours, amount }], assumptions: string[] }
 *   { mode: 'unavailable' }   → the client falls back to the manual module picker
 *
 * The model proposes hours; we price them here (hours × regional rate) purely
 * for the preview. The server /api/quote endpoint recomputes the real total.
 */
export const POST: APIRoute = async ({ request }) => {
  try {
    const body = await request.json().catch(() => null);
    if (!body) return json({ mode: 'unavailable' });

    const description = String(body.description ?? '').trim().slice(0, 2000);
    if (description.length < 20) {
      return json({ mode: 'unavailable' });
    }
    const region: Region = body.region === 'IN' ? 'IN' : 'GLOBAL';
    const hints = Array.isArray(body.hints) ? body.hints.slice(0, 12).map((h: any) => String(h).slice(0, 60)) : [];
    const answeredQuestions = Array.isArray(body.answeredQuestions)
      ? body.answeredQuestions
          .filter((x: any) => x && x.q && x.a)
          .slice(0, 3)
          .map((x: any) => ({ q: String(x.q).slice(0, 200), a: String(x.a).slice(0, 400) }))
      : [];
    const forceBreakdown = !!body.forceBreakdown;

    const scope = await getWebappScope({ description, hints, answeredQuestions, forceBreakdown });
    if (!scope) return json({ mode: 'unavailable' });

    if (scope.mode === 'questions') {
      return json({ mode: 'questions', questions: scope.questions });
    }

    const rate = HOURLY_RATE[region];
    const modules = scope.modules.map((m) => ({
      label: m.label,
      hours: m.hours,
      amount: Math.round(m.hours * rate),
    }));
    return json({ mode: 'breakdown', modules, assumptions: scope.assumptions });
  } catch (e) {
    console.error('Quote scope error:', e);
    return json({ mode: 'unavailable' });
  }
};
