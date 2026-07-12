import React, { useEffect, useMemo, useState } from 'react';
import {
  fetchReviews,
  postReview,
  deleteReview,
  rememberOwnedReview,
  forgetOwnedReview,
  getOwnedTokens,
  initials,
  avatarColor,
  relativeTime,
  requestReviewOtp,
  type Review,
} from './reviewsApi';
import { Stars, StarInput, Avatar } from './Stars';
import { useRecaptcha } from './useRecaptcha';
import ReviewsGlobe from './ReviewsGlobe';

type SortKey = 'newest' | 'highest' | 'lowest';

// ─────────────────────────────────────────────────────────────
// Rating summary — average, stars, and review count (no per-star breakdown)
// ─────────────────────────────────────────────────────────────
function RatingSummary({ reviews }: { reviews: Review[] }) {
  const total = reviews.length;
  const avg = total ? reviews.reduce((s, r) => s + r.rating, 0) / total : 0;

  return (
    <div className="review-card border dark:border-dark p-6 md:p-8 flex flex-col items-center justify-center text-center gap-3">
      <div className="text-6xl font-medium text-primary leading-none">{total ? avg.toFixed(1) : '—'}</div>
      <Stars value={avg} size={22} />
      <p className="text-sm text-secondary/50 dark:text-backgroundBody/50">
        Based on {total} review{total === 1 ? '' : 's'}
      </p>
    </div>
  );
}

// ─────────────────────────────────────────────────────────────
// Sort + star filter chips
// ─────────────────────────────────────────────────────────────
function SortFilterBar({
  sort,
  onSort,
  starFilter,
  onStarFilter,
}: {
  sort: SortKey;
  onSort: (s: SortKey) => void;
  starFilter: number | null;
  onStarFilter: (n: number | null) => void;
}) {
  const sorts: [SortKey, string][] = [
    ['newest', 'Newest'],
    ['highest', 'Highest'],
    ['lowest', 'Lowest'],
  ];

  return (
    <div className="flex flex-wrap items-center justify-between gap-y-3 gap-x-6 mb-8 border-b border-secondary/10 dark:border-backgroundBody/10">
      {/* Sort — quiet underline tabs */}
      <div className="flex items-center gap-5">
        {sorts.map(([k, label]) => (
          <button
            key={k}
            onClick={() => onSort(k)}
            className={`relative pb-3 text-sm transition-colors ${
              sort === k
                ? 'text-secondary dark:text-backgroundBody font-medium'
                : 'text-secondary/45 dark:text-backgroundBody/45 hover:text-secondary/80 dark:hover:text-backgroundBody/80'
            }`}
          >
            {label}
            {sort === k && (
              <span className="absolute left-0 right-0 -bottom-px h-[2px] bg-primary rounded-full" />
            )}
          </button>
        ))}
      </div>

      {/* Star filter — one compact control */}
      <div className="flex items-center gap-1.5 pb-2.5">
        <button
          onClick={() => onStarFilter(null)}
          className={`text-xs px-2.5 py-1 rounded-md transition-colors ${
            starFilter === null
              ? 'bg-secondary/10 dark:bg-backgroundBody/15 text-secondary dark:text-backgroundBody font-medium'
              : 'text-secondary/45 dark:text-backgroundBody/45 hover:text-secondary/80 dark:hover:text-backgroundBody/80'
          }`}
        >
          All
        </button>
        {[5, 4, 3, 2, 1].map((s) => (
          <button
            key={s}
            onClick={() => onStarFilter(starFilter === s ? null : s)}
            className={`text-xs px-2 py-1 rounded-md transition-colors tabular-nums ${
              starFilter === s
                ? 'bg-primary/15 text-primary font-medium'
                : 'text-secondary/45 dark:text-backgroundBody/45 hover:text-secondary/80 dark:hover:text-backgroundBody/80'
            }`}
          >
            {s}<span className="text-[10px]">★</span>
          </button>
        ))}
      </div>
    </div>
  );
}

// ─────────────────────────────────────────────────────────────
// Review form
// ─────────────────────────────────────────────────────────────
function ReviewForm({ onPosted }: { onPosted: (r: Review, token: string) => void }) {
  const [open, setOpen] = useState(false);
  const [rating, setRating] = useState(0);
  const [text, setText] = useState('');
  const [email, setEmail] = useState('');
  const [otpSent, setOtpSent] = useState(false);
  const [sendingOtp, setSendingOtp] = useState(false);
  const [otpNote, setOtpNote] = useState<string | null>(null);
  const [submitting, setSubmitting] = useState(false);
  const [status, setStatus] = useState<{ type: 'error' | 'success'; msg: string } | null>(null);
  const recaptcha = useRecaptcha(open);

  async function sendCode() {
    if (!/^\S+@\S+\.\S+$/.test(email)) {
      setStatus({ type: 'error', msg: 'Enter a valid email first, then tap "Send code".' });
      return;
    }
    setStatus(null);
    setSendingOtp(true);
    try {
      const data = await requestReviewOtp(email.trim());
      if (data.status === 'success') {
        setOtpSent(true);
        setOtpNote(
          data.dev_code
            ? `Dev mode — your code is ${data.dev_code}`
            : 'We emailed you a 6-digit code. It expires in 10 minutes.'
        );
      } else {
        setStatus({ type: 'error', msg: data.message || 'Could not send the code.' });
      }
    } catch {
      setStatus({ type: 'error', msg: 'Network error sending the code.' });
    } finally {
      setSendingOtp(false);
    }
  }

  async function handleSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault();
    setStatus(null);
    const form = e.currentTarget;
    const fd = new FormData(form);
    fd.set('rating', String(rating));
    if (rating < 1) {
      setStatus({ type: 'error', msg: 'Please select a star rating.' });
      return;
    }
    if (!otpSent) {
      setStatus({ type: 'error', msg: 'Please verify your email — tap "Send code" and enter the code.' });
      return;
    }
    const token = recaptcha.getToken();
    if (token) fd.set('g-recaptcha-response', token);

    setSubmitting(true);
    try {
      const data = await postReview(fd);
      if (data.status === 'success' && data.review) {
        onPosted(data.review, data.delete_token);
        form.reset();
        setRating(0);
        setText('');
        setEmail('');
        setOtpSent(false);
        setOtpNote(null);
        recaptcha.reset();
        setStatus({ type: 'success', msg: 'Thanks! Your verified review is now live.' });
        setTimeout(() => setOpen(false), 1200);
      } else {
        setStatus({ type: 'error', msg: data.message || 'Something went wrong.' });
        recaptcha.reset();
      }
    } catch {
      setStatus({ type: 'error', msg: 'Network error. Please try again.' });
    } finally {
      setSubmitting(false);
    }
  }

  const inputCls =
    'review-input py-2.5 px-3.5 focus:outline-none focus:border-primary border border-secondary/10 dark:border-backgroundBody/10 w-full text-base mt-2';

  return (
    <div className="max-w-[720px] mx-auto mb-12">
      <div className="text-center">
        <button onClick={() => setOpen((o) => !o)} className="rv-button rv-button-primary">
          <div className="rv-button-top">
            <span>{open ? 'Close' : 'Write a review'}</span>
          </div>
          <div className="rv-button-bottom">
            <span>{open ? 'Close' : 'Write a review'}</span>
          </div>
        </button>
      </div>

      <div
        className="overflow-hidden transition-all duration-500"
        style={{ maxHeight: open ? 1200 : 0, opacity: open ? 1 : 0 }}
      >
        <form
          onSubmit={handleSubmit}
          className="review-form-card border dark:border-dark p-5 md:p-7 mt-6"
        >
          <h4 className="text-xl mb-5">Share your experience</h4>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
                Your name <span className="text-primary">*</span>
              </label>
              <input required name="author_name" maxLength={100} placeholder="John Doe" className={inputCls} />
            </div>
            <div>
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">Company</label>
              <input name="company_name" maxLength={100} placeholder="Acme Inc. (optional)" className={inputCls} />
            </div>
            <div className={otpSent ? '' : 'md:col-span-full'}>
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
                Email <span className="text-primary">*</span>
              </label>
              {/* Joined input group: email + send-code live in one field */}
              <div className="review-input mt-2 flex items-center border border-secondary/10 dark:border-backgroundBody/10 focus-within:border-primary transition-colors overflow-hidden">
                <input
                  required
                  type="email"
                  name="email"
                  maxLength={255}
                  placeholder="you@company.com"
                  className="flex-1 min-w-0 py-2.5 px-3.5 bg-transparent focus:outline-none text-base"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                />
                <button
                  type="button"
                  onClick={sendCode}
                  disabled={sendingOtp}
                  className="shrink-0 mr-1.5 my-1.5 px-3 py-1.5 rounded-md bg-primary/15 text-primary text-xs font-medium hover:bg-primary hover:text-black transition-colors disabled:opacity-50 whitespace-nowrap"
                >
                  {sendingOtp ? 'Sending…' : otpSent ? 'Resend' : 'Send code'}
                </button>
              </div>
              <p className="text-[11px] text-secondary/40 dark:text-backgroundBody/40 mt-1">
                Never shown publicly — verifies your review is real.
              </p>
            </div>

            {otpSent && (
              <div>
                <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
                  Verification code <span className="text-primary">*</span>
                </label>
                <input
                  required
                  name="otp"
                  inputMode="numeric"
                  pattern="\d{6}"
                  maxLength={6}
                  placeholder="••••••"
                  className={`${inputCls} tracking-[6px] font-medium`}
                />
                {otpNote && <p className="text-[11px] text-primary/80 mt-1">{otpNote}</p>}
              </div>
            )}

            <div>
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">City</label>
              <input name="city" maxLength={80} placeholder="Mumbai, Berlin, New York…" className={inputCls} />
            </div>
            <div>
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
                Country <span className="normal-case text-[11px] text-secondary/40 dark:text-backgroundBody/40">— puts you on the globe 🌍</span>
              </label>
              <input name="country" maxLength={80} placeholder="India, USA, Germany…" className={inputCls} />
            </div>
            <div className="md:col-span-full">
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
                Rating <span className="text-primary">*</span>
              </label>
              <div className="mt-2">
                <StarInput value={rating} onChange={setRating} />
              </div>
            </div>
            <div className="md:col-span-full">
              <label className="text-sm text-secondary/70 dark:text-backgroundBody/70">
                Your review <span className="text-primary">*</span>
              </label>
              <textarea
                required
                name="review_text"
                maxLength={2000}
                rows={4}
                value={text}
                onChange={(e) => setText(e.target.value)}
                placeholder="Tell us about your experience working with Uxory..."
                className={`${inputCls} resize-y`}
              />
              <p className="text-xs text-secondary/40 dark:text-backgroundBody/40 mt-1">{text.length}/2000</p>
            </div>

            {/* Honeypot */}
            <div className="absolute -left-[9999px] opacity-0 h-0 w-0 overflow-hidden" aria-hidden="true">
              <input type="text" name="website" tabIndex={-1} autoComplete="off" />
            </div>

            <div className="md:col-span-full" ref={recaptcha.containerRef} />

            {status && (
              <div
                className={`md:col-span-full text-base font-medium ${
                  status.type === 'error' ? 'text-red-500' : 'text-primary'
                }`}
              >
                {status.msg}
              </div>
            )}

            <div className="md:col-span-full">
              <button
                type="submit"
                disabled={submitting}
                className="bg-primary text-black font-medium px-6 py-3 rounded-full hover:opacity-90 transition-opacity disabled:opacity-60"
              >
                {submitting ? 'Posting…' : 'Post review'}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  );
}

// ─────────────────────────────────────────────────────────────
// Review card
// ─────────────────────────────────────────────────────────────
function ReviewCard({
  review,
  ownedToken,
  onChanged,
}: {
  review: Review;
  ownedToken?: string;
  onChanged: () => void;
}) {
  const [expanded, setExpanded] = useState(false);
  const [deleting, setDeleting] = useState(false);
  const long = review.review_text.length > 280;

  async function handleDelete() {
    if (!ownedToken) return;
    if (!confirm('Delete your review? This cannot be undone.')) return;
    setDeleting(true);
    const data = await deleteReview(review.id, ownedToken);
    if (data.status === 'success') {
      forgetOwnedReview(review.id);
      onChanged();
    } else {
      setDeleting(false);
      alert(data.message || 'Failed to delete.');
    }
  }

  return (
    <div className="review-card border dark:border-dark p-6 md:p-7">
      <div className="flex items-start gap-4">
        <Avatar name={review.author_name} color={avatarColor(review.author_name)} initials={initials(review.author_name)} />
        <div className="flex-1 min-w-0">
          <div className="flex items-start justify-between gap-2">
            <div>
              <p className="font-medium text-secondary dark:text-backgroundBody leading-tight flex items-center gap-1.5">
                {review.author_name}
                {review.verified && (
                  <span
                    className="inline-flex items-center gap-0.5 text-[10px] font-medium text-primary bg-primary/10 rounded-full px-2 py-0.5"
                    title="Email-verified review"
                  >
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="3">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Verified
                  </span>
                )}
              </p>
              {(review.company_name || review.city || review.country) && (
                <p className="text-sm text-secondary/50 dark:text-backgroundBody/50">
                  {[review.company_name, [review.city, review.country].filter(Boolean).join(', ')]
                    .filter(Boolean)
                    .join(' · ')}
                </p>
              )}
            </div>
            {ownedToken && (
              <button
                onClick={handleDelete}
                disabled={deleting}
                className="text-xs text-secondary/40 dark:text-backgroundBody/40 hover:text-red-500 transition-colors shrink-0"
                title="Delete my review"
              >
                {deleting ? 'Deleting…' : 'Delete'}
              </button>
            )}
          </div>
          <div className="flex items-center gap-2 mt-1.5">
            <Stars value={review.rating} size={15} />
            <span className="text-xs text-secondary/40 dark:text-backgroundBody/40">
              {relativeTime(review.created_at)}
            </span>
          </div>

          <p
            className={`mt-3 text-secondary/80 dark:text-backgroundBody/80 leading-relaxed whitespace-pre-line ${
              long && !expanded ? 'line-clamp-4' : ''
            }`}
          >
            {review.review_text}
          </p>
          {long && (
            <button
              onClick={() => setExpanded((e) => !e)}
              className="text-sm text-primary mt-1 hover:underline"
            >
              {expanded ? 'Show less' : 'Read more'}
            </button>
          )}

        </div>
      </div>
    </div>
  );
}

// ─────────────────────────────────────────────────────────────
// Main app
// ─────────────────────────────────────────────────────────────
export default function ReviewsApp() {
  const [reviews, setReviews] = useState<Review[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);
  const [sort, setSort] = useState<SortKey>('newest');
  const [starFilter, setStarFilter] = useState<number | null>(null);
  const [owned, setOwned] = useState<Record<string, string>>({});

  async function load() {
    try {
      const data = await fetchReviews();
      setReviews(data.reviews || []);
      setError(false);
    } catch {
      setError(true);
    } finally {
      setLoading(false);
    }
  }

  useEffect(() => {
    load();
    setOwned(getOwnedTokens());
  }, []);

  const visible = useMemo(() => {
    let list = [...reviews];
    if (starFilter !== null) list = list.filter((r) => r.rating === starFilter);
    switch (sort) {
      case 'highest':
        list.sort((a, b) => b.rating - a.rating || +new Date(b.created_at) - +new Date(a.created_at));
        break;
      case 'lowest':
        list.sort((a, b) => a.rating - b.rating || +new Date(b.created_at) - +new Date(a.created_at));
        break;
      default:
        list.sort((a, b) => +new Date(b.created_at) - +new Date(a.created_at));
    }
    return list;
  }, [reviews, sort, starFilter]);

  function handlePosted(review: Review, token: string) {
    rememberOwnedReview(review.id, token);
    setOwned(getOwnedTokens());
    setReviews((prev) => [review, ...prev]);
  }

  return (
    <div className="max-w-[760px] mx-auto">
      {loading ? (
        <div className="space-y-6">
          {[0, 1, 2].map((i) => (
            <div key={i} className="review-card border dark:border-dark p-6 md:p-8 animate-pulse">
              <div className="h-4 w-32 bg-secondary/10 dark:bg-backgroundBody/10 rounded mb-3" />
              <div className="h-3 w-full bg-secondary/10 dark:bg-backgroundBody/10 rounded mb-2" />
              <div className="h-3 w-2/3 bg-secondary/10 dark:bg-backgroundBody/10 rounded" />
            </div>
          ))}
        </div>
      ) : error ? (
        <div className="text-center py-16">
          <p className="text-secondary/60 dark:text-backgroundBody/60">Couldn’t load reviews right now.</p>
          <button onClick={load} className="mt-4 text-primary hover:underline">
            Try again
          </button>
        </div>
      ) : (
        <>
          {/* Reviews around the world — interactive globe */}
          <div className="mb-12">
            <ReviewsGlobe reviews={reviews as any} />
            <p className="text-center text-xs text-secondary/40 dark:text-backgroundBody/40 mt-3">
              Drag to explore — verified reviews from around the world
            </p>
          </div>

          {reviews.length > 0 && (
            <div className="mb-10">
              <RatingSummary reviews={reviews} />
            </div>
          )}

          <ReviewForm onPosted={handlePosted} />

          {reviews.length > 0 && (
            <SortFilterBar sort={sort} onSort={setSort} starFilter={starFilter} onStarFilter={setStarFilter} />
          )}

          {reviews.length === 0 ? (
            <div className="text-center py-16">
              <h4 className="text-xl font-medium mb-2">No reviews yet</h4>
              <p className="text-secondary/50 dark:text-backgroundBody/50">
                Be the first to share your experience with Uxory.
              </p>
            </div>
          ) : visible.length === 0 ? (
            <div className="text-center py-10 text-secondary/50 dark:text-backgroundBody/50">
              No {starFilter}-star reviews yet.
            </div>
          ) : (
            <div className="space-y-6">
              {visible.map((r) => (
                <ReviewCard key={r.id} review={r} ownedToken={owned[r.id]} onChanged={load} />
              ))}
            </div>
          )}
        </>
      )}
    </div>
  );
}
