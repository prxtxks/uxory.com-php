import * as React from 'react';
import { useEffect, useMemo, useRef, useState } from 'react';
import { motion, animate } from 'framer-motion';
import { estimate, type QuoteAnswers } from '../../lib/pricing/engine';
import type { Region } from '../../lib/pricing/rateCard';
import type { ContactInfo } from './QuoteWizard';

function CountUp({ to, locale, prefix }: { to: number; locale: string; prefix: string }) {
  // Plain React state (not a MotionValue rendered by framer) so the fallback
  // below can flush outside framer's rAF-gated pipeline — rAF is suspended in
  // background/throttled tabs and would otherwise freeze the figure at 0.
  const [val, setVal] = useState(0);
  useEffect(() => {
    const controls = animate(0, to, {
      duration: 1.4,
      ease: [0.16, 1, 0.3, 1],
      onUpdate: (v) => setVal(Math.round(v)),
    });
    const snap = setTimeout(() => setVal(to), 1600); // guaranteed final value
    return () => {
      controls.stop();
      clearTimeout(snap);
    };
  }, [to]);
  return <span className="tabular-nums">{prefix + val.toLocaleString(locale)}</span>;
}

export default function PriceReveal({
  answers,
  region,
  contact,
  comment,
  onStartOver,
}: {
  answers: QuoteAnswers;
  region: Region;
  contact: ContactInfo;
  comment: string;
  onStartOver: () => void;
}) {
  const locale = region === 'IN' ? 'en-IN' : 'en-US';
  const sym = region === 'IN' ? '₹' : '$';
  const quote = useMemo(() => estimate(answers, region), [answers, region]);

  const [submitState, setSubmitState] = useState<'idle' | 'sending' | 'done' | 'error'>('idle');
  const [serverNote, setServerNote] = useState<string | null>(null);
  const [finalRange, setFinalRange] = useState<{ low: number; high: number } | null>(null);
  const submitted = useRef(false);

  async function submit() {
    if (submitted.current) return;
    setSubmitState('sending');
    try {
      const res = await fetch('/api/quote', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ answers, region, contact, comment, website: '' }),
      });
      const data = await res.json();
      if (!res.ok || data.status !== 'success') throw new Error(data.message || 'failed');
      submitted.current = true;
      if (data.quote && (data.quote.low !== quote.low || data.quote.high !== quote.high)) {
        setFinalRange({ low: data.quote.low, high: data.quote.high });
        setServerNote('We refined your estimate based on your notes.');
      }
      setSubmitState('done');
    } catch {
      setSubmitState('error');
    }
  }

  const low = finalRange?.low ?? quote.low;
  const high = finalRange?.high ?? quote.high;

  return (
    <div className="text-center">
      <p className="mb-1 text-xs uppercase tracking-[3px] text-primary">Your indicative estimate</p>

      <div className="mt-3 text-4xl font-medium tabular-nums text-secondary dark:text-backgroundBody md:text-6xl">
        <CountUp to={low} locale={locale} prefix={sym} />
        <span className="mx-2 text-secondary/30 dark:text-backgroundBody/30">–</span>
        <CountUp to={high} locale={locale} prefix={sym} />
      </div>

      <p className="mt-3 text-xs text-secondary/45 dark:text-backgroundBody/45">
        Indicative range · valid 14 days · final quote after a short call
        {quote.flooredTo ? ' · matched to our package pricing' : ''}
      </p>
      {serverNote && <p className="mt-1 text-xs font-medium text-primary">{serverNote}</p>}

      {/* Line items */}
      <div className="mx-auto mt-8 max-w-md rounded-2xl border border-secondary/10 bg-white p-5 text-left dark:border-white/10 dark:bg-white/[0.03]">
        <p className="mb-3 text-xs uppercase tracking-[2px] text-secondary/40 dark:text-backgroundBody/40">
          What's included
        </p>
        <ul className="space-y-2.5">
          {quote.lineItems.map((item, i) => (
            <motion.li
              key={i}
              initial={{ opacity: 0, x: -12 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.5 + i * 0.08 }}
              className="flex items-baseline justify-between gap-3 text-sm"
            >
              <span className="text-secondary/75 dark:text-backgroundBody/75">
                {item.label}
                {item.note && (
                  <span className="ml-1.5 text-xs text-secondary/40 dark:text-backgroundBody/40">({item.note})</span>
                )}
              </span>
              {item.amount !== null && (
                <span className="shrink-0 tabular-nums text-secondary/60 dark:text-backgroundBody/60">
                  {sym}
                  {Math.round(item.amount).toLocaleString(locale)}
                </span>
              )}
            </motion.li>
          ))}
        </ul>
      </div>

      {/* Actions */}
      <div className="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
        {submitState !== 'done' ? (
          <motion.button
            whileTap={{ scale: 0.97 }}
            onClick={submit}
            disabled={submitState === 'sending'}
            className="rounded-full bg-primary px-8 py-3.5 text-sm font-semibold text-black transition-all hover:shadow-lg hover:shadow-primary/25 disabled:opacity-60"
          >
            {submitState === 'sending' ? 'Sending…' : `Email me this quote ✦`}
          </motion.button>
        ) : (
          <div className="rounded-full border border-primary/40 bg-primary/10 px-6 py-3 text-sm font-medium text-primary">
            ✓ Quote sent to {contact.email}
          </div>
        )}
        <a
          href="/calendly"
          className="rounded-full border border-secondary/15 px-8 py-3.5 text-sm font-medium text-secondary transition-colors hover:border-primary dark:border-white/15 dark:text-backgroundBody"
        >
          Book a free call
        </a>
      </div>

      {submitState === 'error' && (
        <p className="mt-3 text-sm text-red-400">
          Couldn't send just now — please retry, or email us at contact@uxory.in
        </p>
      )}

      <button
        type="button"
        onClick={onStartOver}
        className="mt-8 text-xs text-secondary/40 underline-offset-2 transition-colors hover:text-secondary/70 hover:underline dark:text-backgroundBody/40 dark:hover:text-backgroundBody/70"
      >
        Start over
      </button>
    </div>
  );
}
