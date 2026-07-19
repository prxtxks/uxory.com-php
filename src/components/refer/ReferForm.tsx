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

  // Leading-icon SVGs (match the contact form's set).
  const IconUser = (
    <svg className="cform-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth={1.7} strokeLinecap="round" strokeLinejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" /><circle cx="12" cy="7" r="4" /></svg>
  );
  const IconMail = (
    <svg className="cform-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth={1.7} strokeLinecap="round" strokeLinejoin="round"><rect x="2" y="4" width="20" height="16" rx="2" /><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" /></svg>
  );
  const IconBuilding = (
    <svg className="cform-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth={1.7} strokeLinecap="round" strokeLinejoin="round"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4M9 9h.01M9 12h.01M9 15h.01" /></svg>
  );
  const IconMsg = (
    <svg className="cform-icon cform-icon-top" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth={1.7} strokeLinecap="round" strokeLinejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" /></svg>
  );

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
      <div className="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-5">
        <div>
          <label className="cform-label">Your name</label>
          <div className="cform-field-wrap">
            {IconUser}
            <input name="referrer_name" maxLength={100} placeholder="Jane Doe" className="cform-field" />
          </div>
        </div>
        <div>
          <label className="cform-label">Your email <span className="text-primary">*</span></label>
          <div className="cform-field-wrap">
            {IconMail}
            <input required type="email" name="referrer_email" maxLength={255} placeholder="you@email.com" className="cform-field" />
          </div>
        </div>
        <div>
          <label className="cform-label">Referral’s name</label>
          <div className="cform-field-wrap">
            {IconBuilding}
            <input name="client_name" maxLength={100} placeholder="Acme Inc." className="cform-field" />
          </div>
        </div>
        <div>
          <label className="cform-label">Referral’s email <span className="text-primary">*</span></label>
          <div className="cform-field-wrap">
            {IconMail}
            <input required type="email" name="client_email" maxLength={255} placeholder="client@company.com" className="cform-field" />
          </div>
        </div>
      </div>
      <div className="mt-5">
        <label className="cform-label">Anything we should know? <span className="cform-optional">optional</span></label>
        <div className="cform-field-wrap">
          {IconMsg}
          <textarea name="message" maxLength={1000} rows={3} placeholder="What do they need built?" className="cform-field cform-textarea" />
        </div>
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
