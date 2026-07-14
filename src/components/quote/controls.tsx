import * as React from 'react';
import { motion } from 'framer-motion';

/* Shared UI primitives for the Instant Estimate wizard.
   Design language: rounded pills/cards, teal #12D8CC accents, subtle borders —
   matches the reviews-page segmented controls. */

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
        <p className="mb-2 text-xs uppercase tracking-[3px] text-primary">{eyebrow}</p>
      )}
      <h3 className="text-2xl font-medium leading-snug text-secondary dark:text-backgroundBody md:text-3xl">
        {title}
      </h3>
      {subtitle && (
        <p className="mt-2 text-sm text-secondary/55 dark:text-backgroundBody/55">{subtitle}</p>
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
      whileTap={{ scale: 0.98 }}
      onClick={onClick}
      className={`relative flex w-full flex-col items-start gap-2 rounded-2xl border p-4 text-left transition-all duration-200 md:p-5 ${
        selected
          ? 'border-primary bg-primary/[0.07] shadow-[0_0_0_1px_#12D8CC] dark:bg-primary/10'
          : 'border-secondary/10 bg-white hover:border-primary/40 dark:border-white/10 dark:bg-white/[0.03] dark:hover:border-primary/40'
      }`}
    >
      {badge && (
        <span className="absolute right-3 top-3 rounded-full bg-primary px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-black">
          {badge}
        </span>
      )}
      {icon && (
        <span className={`${selected ? 'text-primary' : 'text-secondary/50 dark:text-backgroundBody/50'}`}>
          {icon}
        </span>
      )}
      <span className="text-[15px] font-medium leading-tight text-secondary dark:text-backgroundBody">
        {label}
      </span>
      {hint && (
        <span className="text-xs leading-relaxed text-secondary/50 dark:text-backgroundBody/50">
          {hint}
        </span>
      )}
      <span
        className={`absolute bottom-3 right-3 flex h-5 w-5 items-center justify-center rounded-full border transition-all ${
          selected
            ? 'border-primary bg-primary text-black'
            : 'border-secondary/20 dark:border-white/20'
        }`}
      >
        {selected && (
          <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="3.2">
            <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
          </svg>
        )}
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
      whileTap={{ scale: 0.96 }}
      onClick={onClick}
      className={`rounded-full border px-4 py-2 text-sm transition-all duration-150 ${
        selected
          ? 'border-primary bg-primary/10 font-medium text-primary'
          : 'border-secondary/12 text-secondary/65 hover:border-primary/40 dark:border-white/12 dark:text-backgroundBody/65'
      }`}
    >
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
    'flex h-9 w-9 items-center justify-center rounded-full border border-secondary/15 text-lg text-secondary/70 transition-colors hover:border-primary hover:text-primary disabled:opacity-30 dark:border-white/15 dark:text-backgroundBody/70';
  return (
    <div className="inline-flex items-center gap-3">
      <button type="button" className={btn} disabled={value <= min} onClick={() => onChange(Math.max(min, value - step))}>
        −
      </button>
      <span className="min-w-[3ch] text-center text-lg font-medium tabular-nums text-secondary dark:text-backgroundBody">
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
    <div>
      <div className="mb-3 text-2xl font-medium tabular-nums text-secondary dark:text-backgroundBody">
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
          background: `linear-gradient(to right, #12D8CC 0%, #12D8CC ${pct}%, rgba(128,128,128,0.2) ${pct}%, rgba(128,128,128,0.2) 100%)`,
        }}
      />
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
    'w-full rounded-xl border border-secondary/12 bg-white px-4 py-3 text-[15px] text-secondary outline-none transition-colors placeholder:text-secondary/35 focus:border-primary dark:border-white/12 dark:bg-white/[0.04] dark:text-backgroundBody dark:placeholder:text-backgroundBody/30';
  return (
    <label className="block">
      <span className="mb-1.5 block text-sm text-secondary/60 dark:text-backgroundBody/60">
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
      className="flex w-full items-center justify-between gap-4 rounded-2xl border border-secondary/10 bg-white p-4 text-left transition-colors hover:border-primary/40 dark:border-white/10 dark:bg-white/[0.03]"
    >
      <span>
        <span className="block text-[15px] font-medium text-secondary dark:text-backgroundBody">{label}</span>
        {hint && <span className="mt-0.5 block text-xs text-secondary/50 dark:text-backgroundBody/50">{hint}</span>}
      </span>
      <span
        className={`relative h-6 w-11 shrink-0 rounded-full transition-colors ${on ? 'bg-primary' : 'bg-secondary/15 dark:bg-white/15'}`}
      >
        <span
          className={`absolute top-0.5 h-5 w-5 rounded-full bg-white shadow transition-all ${on ? 'left-[22px]' : 'left-0.5'}`}
        />
      </span>
    </button>
  );
}
