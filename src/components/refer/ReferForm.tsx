import React, { useState } from 'react';

export default function ReferForm() {
  const [submitting, setSubmitting] = useState(false);
  const [done, setDone] = useState(false);
  const [error, setError] = useState('');

  async function onSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault();
    setError('');
    setSubmitting(true);
    try {
      const res = await fetch('/api/refer', { method: 'POST', body: new FormData(e.currentTarget) });
      const data = await res.json();
      if (data.status === 'success') setDone(true);
      else setError(data.message || 'Something went wrong.');
    } catch {
      setError('Network error. Please try again.');
    } finally {
      setSubmitting(false);
    }
  }

  const input =
    'w-full px-4 py-3 rounded-xl bg-white dark:bg-[#151515] border border-secondary/10 dark:border-backgroundBody/10 focus:outline-none focus:border-primary text-base mt-2';

  if (done) {
    return (
      <div className="rounded-2xl border border-primary/30 bg-primary/5 p-8 text-center max-w-lg mx-auto">
        <div className="w-14 h-14 mx-auto mb-4 rounded-full bg-primary/15 flex items-center justify-center">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#12D8CC" strokeWidth="2">
            <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h3 className="text-2xl font-medium mb-2">Referral received 🎉</h3>
        <p className="text-secondary/70 dark:text-backgroundBody/70">
          Thanks! We’ll reach out to your referral and keep you posted. Your 10% reward kicks in once they become a paying client.
        </p>
      </div>
    );
  }

  return (
    <form
      onSubmit={onSubmit}
      className="max-w-lg mx-auto rounded-2xl border border-secondary/10 dark:border-backgroundBody/10 bg-secondary/[0.02] dark:bg-white/[0.03] p-6 md:p-8"
    >
      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">Your name</label>
          <input name="referrer_name" maxLength={100} placeholder="Jane Doe" className={input} />
        </div>
        <div>
          <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
            Your email <span className="text-primary">*</span>
          </label>
          <input required type="email" name="referrer_email" maxLength={255} placeholder="you@email.com" className={input} />
        </div>
        <div>
          <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">Referral’s name</label>
          <input name="client_name" maxLength={100} placeholder="Acme Inc." className={input} />
        </div>
        <div>
          <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
            Referral’s email <span className="text-primary">*</span>
          </label>
          <input required type="email" name="client_email" maxLength={255} placeholder="client@company.com" className={input} />
        </div>
      </div>
      <div className="mt-4">
        <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">Anything we should know? (optional)</label>
        <textarea name="message" maxLength={1000} rows={3} placeholder="What do they need built?" className={`${input} resize-y`} />
      </div>

      {/* Honeypot */}
      <div className="absolute -left-[9999px] opacity-0 h-0 w-0 overflow-hidden" aria-hidden="true">
        <input type="text" name="website" tabIndex={-1} autoComplete="off" />
      </div>

      {error && <p className="text-red-500 text-sm mt-3">{error}</p>}

      <div className="mt-6">
        <button
          type="submit"
          disabled={submitting}
          className="rv-button rv-button-primary inline-block disabled:pointer-events-none disabled:opacity-60"
        >
          <div className="rv-button-top">
            <span className="text-nowrap">{submitting ? 'Submitting…' : 'Submit referral'}</span>
          </div>
          <div className="rv-button-bottom">
            <span className="text-nowrap">{submitting ? 'Submitting…' : 'Submit referral'}</span>
          </div>
        </button>
      </div>
      <p className="text-xs text-secondary/40 dark:text-backgroundBody/40 mt-3 text-center">
        We’ll only use these emails to process your referral. No spam.
      </p>
    </form>
  );
}
