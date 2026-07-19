import * as React from 'react';
import { motion, AnimatePresence } from 'framer-motion';

/* Shared UI primitives for the Instant Estimate wizard.
   Design language: glassy cards over the site's dark/light surfaces, teal
   #12D8CC accents with soft glows, gradient edges - an "AI console" feel. */

/* Four-point spark - the ✦ used across the site's marquees. */
export function Spark({ size = 14, className = '' }: { size?: number; className?: string }) {
  return (
    <svg width={size} height={size} viewBox="0 0 40 40" fill="none" className={className} aria-hidden="true">
      <path
        d="M20 0C20 0 19.8 11.2 24.3 15.7C28.8 20.2 40 20 40 20C40 20 28.8 19.8 24.3 24.3C19.8 28.8 20 40 20 40C20 40 20.2 28.8 15.7 24.3C11.2 19.8 0 20 0 20C0 20 11.2 20.2 15.7 15.7C20.2 11.2 20 0 20 0Z"
        fill="currentColor"
      />
    </svg>
  );
}

export function StepShell({
  eyebrow,
  title,
  subtitle,
  children,
}: {
  eyebrow?: string;
  title: string;
  subtitle?: string;
  children: React.ReactNode;
}) {
  return (
    <div>
      {eyebrow && (
        <p className="mb-2.5 flex items-center gap-1.5 text-[11px] font-medium uppercase tracking-[3px] text-primary">
          <Spark size={10} />
          {eyebrow}
        </p>
      )}
      <h3 className="text-[26px] font-medium leading-snug tracking-[-0.5px] text-secondary dark:text-backgroundBody md:text-[34px]">
        {title}
      </h3>
      {subtitle && (
        <p className="mt-2.5 max-w-xl text-[15px] leading-relaxed text-secondary/55 dark:text-backgroundBody/55 md:text-base">
          {subtitle}
        </p>
      )}
      <div className="mt-7">{children}</div>
    </div>
  );
}

export function OptionCard({
  selected,
  onClick,
  icon,
  label,
  hint,
  badge,
}: {
  selected: boolean;
  onClick: () => void;
  icon?: React.ReactNode;
  label: string;
  hint?: string;
  badge?: string;
}) {
  return (
    <motion.button
      type="button"
      whileTap={{ scale: 0.97 }}
      onClick={onClick}
      className={`group relative flex w-full flex-col items-start gap-2.5 rounded-2xl border p-4 text-left transition-all duration-300 max-md:pb-10 md:p-5 ${
        selected
          ? 'border-primary/70 bg-gradient-to-br from-primary/[0.14] via-primary/[0.05] to-transparent shadow-[0_0_28px_-8px_rgba(18,216,204,0.55)]'
          : 'border-secondary/10 bg-white/70 hover:-translate-y-0.5 hover:border-primary/40 hover:shadow-[0_10px_32px_-14px_rgba(0,0,0,0.3)] dark:border-white/10 dark:bg-white/[0.03] dark:hover:bg-white/[0.06] dark:hover:shadow-[0_0_24px_-10px_rgba(18,216,204,0.35)]'
      }`}
    >
      {badge && (
        <span className="absolute right-3 top-3 rounded-full bg-gradient-to-r from-primary to-[#4be0c7] px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wide text-black shadow-[0_2px_10px_-2px_rgba(18,216,204,0.6)]">
          {badge}
        </span>
      )}
      {icon && (
        <span
          className={`flex h-11 w-11 items-center justify-center rounded-xl transition-all duration-300 ${
            selected
              ? 'bg-primary/15 text-primary shadow-[inset_0_0_0_1px_rgba(18,216,204,0.35)]'
              : 'bg-secondary/[0.05] text-secondary/55 group-hover:bg-primary/10 group-hover:text-primary dark:bg-white/[0.06] dark:text-backgroundBody/55'
          }`}
        >
          {icon}
        </span>
      )}
      <span className="text-[16px] font-medium leading-tight text-secondary dark:text-backgroundBody md:text-[17px]">
        {label}
      </span>
      {hint && (
        <span className="text-[13px] leading-relaxed text-secondary/50 dark:text-backgroundBody/50 md:text-sm">
          {hint}
        </span>
      )}
      <span
        className={`absolute bottom-3.5 right-3.5 flex h-[22px] w-[22px] items-center justify-center rounded-full border transition-all duration-200 ${
          selected
            ? 'border-primary bg-primary text-black shadow-[0_0_12px_-2px_rgba(18,216,204,0.8)]'
            : 'border-secondary/20 group-hover:border-primary/50 dark:border-white/20'
        }`}
      >
        <AnimatePresence>
          {selected && (
            <motion.svg
              initial={{ scale: 0, opacity: 0 }}
              animate={{ scale: 1, opacity: 1 }}
              exit={{ scale: 0, opacity: 0 }}
              transition={{ type: 'spring', stiffness: 500, damping: 25 }}
              width="11"
              height="11"
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
    </motion.button>
  );
}

export function Chip({
  selected,
  onClick,
  children,
}: {
  selected: boolean;
  onClick: () => void;
  children: React.ReactNode;
}) {
  return (
    <motion.button
      type="button"
      whileTap={{ scale: 0.95 }}
      onClick={onClick}
      className={`inline-flex items-center gap-1.5 rounded-full border px-[16px] py-2.5 text-[14px] transition-all duration-200 md:text-[15px] ${
        selected
          ? 'border-primary/70 bg-primary/[0.12] font-medium text-primary shadow-[0_0_16px_-6px_rgba(18,216,204,0.6)]'
          : 'border-secondary/12 text-secondary/65 hover:border-primary/40 hover:text-secondary dark:border-white/12 dark:text-backgroundBody/65 dark:hover:text-backgroundBody'
      }`}
    >
      <AnimatePresence>
        {selected && (
          <motion.svg
            initial={{ width: 0, opacity: 0 }}
            animate={{ width: 12, opacity: 1 }}
            exit={{ width: 0, opacity: 0 }}
            transition={{ duration: 0.15 }}
            width="12"
            height="12"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="3"
            className="shrink-0"
          >
            <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
          </motion.svg>
        )}
      </AnimatePresence>
      {children}
    </motion.button>
  );
}

export function Counter({
  value,
  onChange,
  min = 0,
  max = 500,
  step = 1,
}: {
  value: number;
  onChange: (n: number) => void;
  min?: number;
  max?: number;
  step?: number;
}) {
  const btn =
    'flex h-10 w-10 items-center justify-center rounded-xl border border-secondary/15 text-lg text-secondary/70 transition-all hover:border-primary hover:text-primary hover:shadow-[0_0_14px_-5px_rgba(18,216,204,0.6)] disabled:opacity-30 disabled:hover:border-secondary/15 disabled:hover:shadow-none dark:border-white/15 dark:text-backgroundBody/70';
  return (
    <div className="inline-flex items-center gap-1 rounded-2xl border border-secondary/10 bg-white/60 p-1.5 dark:border-white/10 dark:bg-white/[0.04]">
      <button type="button" className={btn} disabled={value <= min} onClick={() => onChange(Math.max(min, value - step))}>
        −
      </button>
      <span className="min-w-[3.5ch] text-center text-lg font-semibold tabular-nums text-secondary dark:text-backgroundBody">
        {value}
      </span>
      <button type="button" className={btn} disabled={value >= max} onClick={() => onChange(Math.min(max, value + step))}>
        +
      </button>
    </div>
  );
}

export function SliderControl({
  value,
  onChange,
  min,
  max,
  step = 1,
  format,
}: {
  value: number;
  onChange: (n: number) => void;
  min: number;
  max: number;
  step?: number;
  format?: (n: number) => string;
}) {
  const pct = ((value - min) / (max - min)) * 100;
  return (
    <div className="rounded-2xl border border-secondary/10 bg-white/60 p-5 dark:border-white/10 dark:bg-white/[0.03] md:p-6">
      <div className="mb-5 bg-gradient-to-r from-teal-600 to-cyan-500 bg-clip-text text-3xl font-semibold tabular-nums text-transparent dark:from-primary dark:to-[#8ef2e9]">
        {format ? format(value) : value}
      </div>
      <input
        type="range"
        min={min}
        max={max}
        step={step}
        value={value}
        onChange={(e) => onChange(Number(e.target.value))}
        className="quote-slider w-full"
        style={{
          background: `linear-gradient(to right, #12D8CC 0%, #12D8CC ${pct}%, rgba(128,128,128,0.18) ${pct}%, rgba(128,128,128,0.18) 100%)`,
        }}
      />
      <div className="mt-2.5 flex justify-between text-xs text-secondary/40 dark:text-backgroundBody/40">
        <span>{min}</span>
        <span>{max}+</span>
      </div>
    </div>
  );
}

export function TextField({
  label,
  value,
  onChange,
  type = 'text',
  placeholder,
  required,
  textarea,
}: {
  label: string;
  value: string;
  onChange: (v: string) => void;
  type?: string;
  placeholder?: string;
  required?: boolean;
  textarea?: boolean;
}) {
  const cls =
    'w-full rounded-xl border border-secondary/12 bg-white/80 px-4 py-3.5 text-base text-secondary outline-none transition-all duration-200 placeholder:text-secondary/35 focus:border-primary focus:ring-[3px] focus:ring-primary/15 focus:shadow-[0_0_20px_-8px_rgba(18,216,204,0.5)] dark:border-white/12 dark:bg-white/[0.04] dark:text-backgroundBody dark:placeholder:text-backgroundBody/30';
  return (
    <label className="block">
      <span className="mb-1.5 block text-[14px] font-medium text-secondary/60 dark:text-backgroundBody/60">
        {label}
        {required && <span className="text-primary"> *</span>}
      </span>
      {textarea ? (
        <textarea
          value={value}
          onChange={(e) => onChange(e.target.value)}
          placeholder={placeholder}
          rows={4}
          className={cls}
        />
      ) : (
        <input
          type={type}
          value={value}
          onChange={(e) => onChange(e.target.value)}
          placeholder={placeholder}
          className={cls}
        />
      )}
    </label>
  );
}

export function Toggle({
  on,
  onChange,
  label,
  hint,
}: {
  on: boolean;
  onChange: (v: boolean) => void;
  label: string;
  hint?: string;
}) {
  return (
    <button
      type="button"
      onClick={() => onChange(!on)}
      className={`flex w-full items-center justify-between gap-4 rounded-2xl border p-4 text-left transition-all duration-200 md:p-5 ${
        on
          ? 'border-primary/50 bg-primary/[0.06] shadow-[0_0_20px_-10px_rgba(18,216,204,0.5)]'
          : 'border-secondary/10 bg-white/70 hover:border-primary/40 dark:border-white/10 dark:bg-white/[0.03]'
      }`}
    >
      <span>
        <span className="block text-[16px] font-medium text-secondary dark:text-backgroundBody md:text-[17px]">{label}</span>
        {hint && <span className="mt-0.5 block text-[13px] text-secondary/50 dark:text-backgroundBody/50 md:text-sm">{hint}</span>}
      </span>
      <span
        className={`relative h-[26px] w-[46px] shrink-0 rounded-full transition-all duration-200 ${
          on ? 'bg-primary shadow-[0_0_14px_-3px_rgba(18,216,204,0.8)]' : 'bg-secondary/15 dark:bg-white/15'
        }`}
      >
        <span
          className={`absolute top-[3px] h-5 w-5 rounded-full bg-white shadow transition-all duration-200 ${on ? 'left-[23px]' : 'left-[3px]'}`}
        />
      </span>
    </button>
  );
}
