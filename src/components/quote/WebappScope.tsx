import * as React from 'react';
import { useEffect, useRef, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { HOURLY_RATE, WEBAPP_MODULES, type Region } from '../../lib/pricing/rateCard';
import type { AppModule } from '../../lib/pricing/engine';
import { Spark, TextField } from './controls';

type ApiModule = { label: string; hours: number; amount?: number };
type Phase = 'loading' | 'questions' | 'breakdown' | 'manual';

/**
 * The AI-assisted scoping step for a custom web app.
 *
 * Flow: on mount it sends the client's description to /api/quote/scope. The
 * model either asks up to 3 clarifying questions (answered inline) or returns
 * an itemized module breakdown. Modules are tickable; money is shown, hours
 * stay internal. If the model is unavailable it falls back to a manual picker
 * built from the reference library, so the flow always works.
 */
export default function WebappScope({
  description,
  hints,
  region,
  value,
  onChange,
}: {
  description: string;
  hints: string[];
  region: Region;
  value: AppModule[];
  onChange: (modules: AppModule[]) => void;
}) {
  const sym = region === 'IN' ? '₹' : '$';
  const locale = region === 'IN' ? 'en-IN' : 'en-US';
  const rate = HOURLY_RATE[region];
  const money = (hours: number) => sym + Math.round(hours * rate).toLocaleString(locale);

  const [phase, setPhase] = useState<Phase>('loading');
  const [questions, setQuestions] = useState<string[]>([]);
  const [answers, setAnswers] = useState<string[]>([]);
  const [assumptions, setAssumptions] = useState<string[]>([]);
  // The full set of offered modules (from the model or the library), and which
  // labels are currently ticked. Selection drives the live estimate.
  const [offered, setOffered] = useState<AppModule[]>([]);
  const [selected, setSelected] = useState<Set<string>>(new Set());
  const ran = useRef(false);

  // Keep the wizard's answers in sync with the current selection.
  const pushSelection = (all: AppModule[], sel: Set<string>) => {
    onChange(all.filter((m) => sel.has(m.label)));
  };

  async function requestScope(forceBreakdown: boolean, answered: { q: string; a: string }[]) {
    setPhase('loading');
    try {
      const res = await fetch('/api/quote/scope', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ description, hints, region, answeredQuestions: answered, forceBreakdown }),
      });
      const data = await res.json();
      if (data.mode === 'questions' && Array.isArray(data.questions) && data.questions.length) {
        setQuestions(data.questions);
        setAnswers(new Array(data.questions.length).fill(''));
        setPhase('questions');
        return;
      }
      if (data.mode === 'breakdown' && Array.isArray(data.modules) && data.modules.length) {
        applyModules(data.modules as ApiModule[], data.assumptions ?? []);
        return;
      }
      // unavailable or empty → manual picker
      startManual();
    } catch {
      startManual();
    }
  }

  function applyModules(mods: ApiModule[], notes: string[]) {
    const all: AppModule[] = mods.map((m) => ({ label: m.label, hours: m.hours }));
    const sel = new Set(all.map((m) => m.label));
    setOffered(all);
    setSelected(sel);
    setAssumptions(Array.isArray(notes) ? notes.slice(0, 4) : []);
    setPhase('breakdown');
    pushSelection(all, sel);
  }

  function startManual() {
    // Reasonable starting scope so the estimate is never empty.
    const preselect = new Set(['Authentication & user roles', 'Main dashboard', 'Data module (create, list, edit, delete)']);
    const all: AppModule[] = WEBAPP_MODULES.map((m) => ({ label: m.label, hours: m.hours }));
    const sel = new Set([...preselect].filter((l) => all.some((m) => m.label === l)));
    setOffered(all);
    setSelected(sel);
    setAssumptions([]);
    setPhase('manual');
    pushSelection(all, sel);
  }

  // Run once when the step mounts.
  useEffect(() => {
    if (ran.current) return;
    ran.current = true;
    if (value.length > 0) {
      // Returning to this step - keep the prior selection, rebuild the list.
      const labels = new Set(value.map((m) => m.label));
      const base = [...value, ...WEBAPP_MODULES.map((m) => ({ label: m.label, hours: m.hours })).filter((m) => !labels.has(m.label))];
      setOffered(base);
      setSelected(new Set(value.map((m) => m.label)));
      setPhase(value.length ? 'breakdown' : 'manual');
      return;
    }
    requestScope(false, []);
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  const toggle = (label: string) => {
    setSelected((prev) => {
      const next = new Set(prev);
      next.has(label) ? next.delete(label) : next.add(label);
      pushSelection(offered, next);
      return next;
    });
  };

  const submitAnswers = () => {
    const answered = questions.map((q, i) => ({ q, a: answers[i]?.trim() || 'no preference' }));
    requestScope(true, answered);
  };

  const selectedHours = offered.filter((m) => selected.has(m.label)).reduce((s, m) => s + m.hours, 0);

  /* ── Loading ── */
  if (phase === 'loading') {
    return (
      <div className="py-6">
        <p className="mb-5 flex items-center gap-2 text-[15px] font-medium text-primary">
          <motion.span animate={{ rotate: 360 }} transition={{ repeat: Infinity, duration: 2, ease: 'linear' }}>
            <Spark size={16} />
          </motion.span>
          Reading your description and scoping the build...
        </p>
        <div className="space-y-3">
          {[0, 1, 2, 3].map((i) => (
            <motion.div
              key={i}
              className="h-14 rounded-xl border border-secondary/10 bg-secondary/[0.03] dark:border-white/10 dark:bg-white/[0.03]"
              animate={{ opacity: [0.4, 0.8, 0.4] }}
              transition={{ repeat: Infinity, duration: 1.4, delay: i * 0.15 }}
            />
          ))}
        </div>
      </div>
    );
  }

  /* ── Clarifying questions ── */
  if (phase === 'questions') {
    return (
      <div>
        <p className="mb-1 flex items-center gap-2 text-[13px] font-medium uppercase tracking-[2px] text-primary">
          <Spark size={11} /> A couple of quick questions
        </p>
        <p className="mb-6 max-w-xl text-[15px] text-secondary/55 dark:text-backgroundBody/55">
          Your answers sharpen the breakdown. Rough is fine, or leave blank and we will assume sensible defaults.
        </p>
        <div className="space-y-4">
          {questions.map((q, i) => (
            <TextField
              key={i}
              label={q}
              value={answers[i] ?? ''}
              onChange={(v) => setAnswers((prev) => prev.map((x, j) => (j === i ? v : x)))}
              placeholder="Your answer (optional)"
            />
          ))}
        </div>
        <button
          type="button"
          onClick={submitAnswers}
          className="mt-6 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-[15px] font-medium text-black transition-opacity hover:opacity-90"
        >
          <Spark size={13} /> Build my breakdown
        </button>
      </div>
    );
  }

  /* ── Breakdown / manual picker ── */
  const isManual = phase === 'manual';
  return (
    <div>
      <p className="mb-1 flex items-center gap-2 text-[13px] font-medium uppercase tracking-[2px] text-primary">
        <Spark size={11} /> {isManual ? 'Pick what your app needs' : 'Here is what your app needs'}
      </p>
      <p className="mb-6 max-w-xl text-[15px] text-secondary/55 dark:text-backgroundBody/55">
        {isManual
          ? 'Tick the parts your app needs. Every custom web app also includes architecture, setup and QA.'
          : 'We turned your description into these building blocks. Untick anything you do not need, or add more below. Architecture, setup and QA are always included.'}
      </p>

      <div className="space-y-2.5">
        {offered.map((m) => {
          const on = selected.has(m.label);
          return (
            <motion.button
              key={m.label}
              type="button"
              whileTap={{ scale: 0.99 }}
              onClick={() => toggle(m.label)}
              className={`flex w-full items-center justify-between gap-4 rounded-xl border px-4 py-3.5 text-left transition-all duration-200 ${
                on
                  ? 'border-primary/60 bg-primary/[0.07] shadow-[0_0_16px_-8px_rgba(18,216,204,0.5)]'
                  : 'border-secondary/10 bg-white/60 hover:border-primary/40 dark:border-white/10 dark:bg-white/[0.03]'
              }`}
            >
              <span className="flex items-center gap-3">
                <span
                  className={`flex h-[22px] w-[22px] shrink-0 items-center justify-center rounded-md border transition-all ${
                    on ? 'border-primary bg-primary text-black' : 'border-secondary/25 dark:border-white/25'
                  }`}
                >
                  <AnimatePresence>
                    {on && (
                      <motion.svg
                        initial={{ scale: 0 }}
                        animate={{ scale: 1 }}
                        exit={{ scale: 0 }}
                        width="12"
                        height="12"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        strokeWidth="3.2"
                      >
                        <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                      </motion.svg>
                    )}
                  </AnimatePresence>
                </span>
                <span className={`text-[15px] ${on ? 'font-medium text-secondary dark:text-backgroundBody' : 'text-secondary/70 dark:text-backgroundBody/70'}`}>
                  {m.label}
                </span>
              </span>
              <span className={`shrink-0 text-[14px] tabular-nums ${on ? 'text-primary' : 'text-secondary/40 dark:text-backgroundBody/40'}`}>
                {money(m.hours)}
              </span>
            </motion.button>
          );
        })}
      </div>

      {assumptions.length > 0 && (
        <div className="mt-5 rounded-xl border border-secondary/10 bg-secondary/[0.02] p-4 dark:border-white/10 dark:bg-white/[0.02]">
          <p className="mb-2 text-[12px] font-medium uppercase tracking-[1.5px] text-secondary/45 dark:text-backgroundBody/45">
            What we assumed
          </p>
          <ul className="space-y-1">
            {assumptions.map((note, i) => (
              <li key={i} className="flex gap-2 text-[13.5px] text-secondary/60 dark:text-backgroundBody/60">
                <span className="text-primary">-</span>
                {note}
              </li>
            ))}
          </ul>
        </div>
      )}

      <div className="mt-5 flex items-center justify-between text-[13px] text-secondary/45 dark:text-backgroundBody/45">
        <span>{selected.size} module{selected.size === 1 ? '' : 's'} selected</span>
        <span className="tabular-nums">~{Math.round(selectedHours)} hrs of build</span>
      </div>
    </div>
  );
}
