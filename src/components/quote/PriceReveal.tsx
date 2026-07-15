import * as React from 'react';
import { useEffect, useMemo, useRef, useState } from 'react';
import { motion, animate } from 'framer-motion';
import { estimate, type QuoteAnswers } from '../../lib/pricing/engine';
import type { Region } from '../../lib/pricing/rateCard';
import type { ContactInfo } from './QuoteWizard';
import { Spark } from './controls';

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
    <div className="relative text-center">
      {/* Radial glow behind the headline number */}
      <div className="pointer-events-none absolute inset-x-0 -top-6 mx-auto h-56 max-w-lg bg-[radial-gradient(50%_60%_at_50%_40%,rgba(18,216,204,0.18),transparent_70%)]" />

      <motion.p
        initial={{ opacity: 0, y: 8 }}
        animate={{ opacity: 1, y: 0 }}
        className="relative mb-2 inline-flex items-center gap-1.5 text-xs font-medium uppercase tracking-[3px] text-primary"
      >
        <Spark size={11} />
        Your indicative estimate
      </motion.p>

      <motion.div
        initial={{ opacity: 0, scale: 0.96 }}
        animate={{ opacity: 1, scale: 1 }}
        transition={{ duration: 0.5, ease: [0.16, 1, 0.3, 1] }}
        className="relative mt-3 text-[44px] font-semibold tracking-[-1px] tabular-nums md:text-7xl"
      >
        <span className="bg-gradient-to-br from-secondary to-secondary/70 bg-clip-text text-transparent dark:from-white dark:to-white/70">
          <CountUp to={low} locale={locale} prefix={sym} />
        </span>
        <span className="mx-2 text-secondary/25 dark:text-backgroundBody/25">–</span>
        <span className="bg-gradient-to-br from-secondary to-secondary/70 bg-clip-text text-transparent dark:from-white dark:to-white/70">
          <CountUp to={high} locale={locale} prefix={sym} />
        </span>
      </motion.div>

      <p className="relative mt-3 text-sm text-secondary/45 dark:text-backgroundBody/45">
        Indicative range · valid 14 days · final quote after a short call
        {quote.flooredTo ? ' · matched to our package pricing' : ''}
      </p>
      {serverNote && (
        <p className="relative mt-1.5 inline-flex items-center gap-1.5 text-xs font-medium text-primary">
          <Spark size={10} />
          {serverNote}
        </p>
      )}

      {/* Line items */}
      <div className="relative mx-auto mt-8 max-w-md overflow-hidden rounded-2xl border border-secondary/10 bg-white/70 p-5 text-left backdrop-blur-sm dark:border-white/10 dark:bg-white/[0.03]">
        <p className="mb-3 flex items-center gap-1.5 text-xs uppercase tracking-[2px] text-secondary/40 dark:text-backgroundBody/40">
          <span className="h-1 w-1 rounded-full bg-primary" />
          What's included
        </p>
        <ul className="space-y-2.5">
          {quote.lineItems.map((item, i) => (
            <motion.li
              key={i}
              initial={{ opacity: 0, x: -12 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.5 + i * 0.08 }}
              className="flex items-baseline justify-between gap-3 text-[15px]"
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
      <div className="relative mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
        {submitState !== 'done' ? (
          <motion.button
            whileTap={{ scale: 0.97 }}
            onClick={submit}
            disabled={submitState === 'sending'}
            className="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-primary to-[#12cfc4] px-9 py-4 text-base font-semibold text-black shadow-[0_10px_28px_-8px_rgba(18,216,204,0.7)] transition-all hover:shadow-[0_12px_34px_-6px_rgba(18,216,204,0.85)] disabled:opacity-60"
          >
            {submitState === 'sending' ? (
              <>
                <span className="h-4 w-4 animate-spin rounded-full border-2 border-black/30 border-t-black" />
                Sending…
              </>
            ) : (
              <>
                Email me this quote
                <Spark size={13} />
              </>
            )}
          </motion.button>
        ) : (
          <motion.div
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            className="inline-flex items-center gap-2 rounded-full border border-primary/40 bg-primary/10 px-6 py-3 text-sm font-medium text-primary"
          >
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="3">
              <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Quote sent to {contact.email}
          </motion.div>
        )}
        <a
          href="/calendly"
          className="rounded-full border border-secondary/15 px-9 py-4 text-base font-medium text-secondary transition-all hover:border-primary hover:text-primary dark:border-white/15 dark:text-backgroundBody"
        >
          Book a free call
        </a>
      </div>

      {submitState === 'error' && (
        <p className="relative mt-3 text-sm text-red-400">
          Couldn't send just now — please retry, or email us at contact@uxory.in
        </p>
      )}

      <button
        type="button"
        onClick={onStartOver}
        className="relative mt-8 text-xs text-secondary/40 underline-offset-2 transition-colors hover:text-secondary/70 hover:underline dark:text-backgroundBody/40 dark:hover:text-backgroundBody/70"
      >
        Start over
      </button>
    </div>
  );
}
