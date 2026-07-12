// Types + API helpers + small utilities for the reviews island.
// Backend contract lives in src/pages/api/reviews/*.

export interface Reply {
  id: string;
  review_id: string;
  author_name: string;
  company_name: string | null;
  reply_text: string;
  created_at: string;
}

export interface Review {
  id: string;
  author_name: string;
  company_name: string | null;
  rating: number;
  review_text: string;
  created_at: string;
  verified?: boolean;
  city?: string | null;
  country?: string | null;
  lat?: number | null;
  lng?: number | null;
  review_replies: Reply[];
}

/** Request an email verification code for posting a review. */
export async function requestReviewOtp(email: string) {
  const form = new FormData();
  form.append('email', email);
  const res = await fetch('/api/reviews/verify', { method: 'POST', body: form });
  return res.json();
}

export interface ReviewsResponse {
  status: string;
  reviews: Review[];
  stats: { total: number; average_rating: number };
}

const RECAPTCHA_SITE_KEY = '6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX';
export { RECAPTCHA_SITE_KEY };

export async function fetchReviews(): Promise<ReviewsResponse> {
  const res = await fetch('/api/reviews/', { headers: { Accept: 'application/json' } });
  if (!res.ok) throw new Error('Failed to load reviews');
  return res.json();
}

export async function postReview(form: FormData) {
  const res = await fetch('/api/reviews/', { method: 'POST', body: form });
  return res.json();
}

export async function postReply(form: FormData) {
  const res = await fetch('/api/reviews/reply', { method: 'POST', body: form });
  return res.json();
}

export async function deleteReview(reviewId: string, deleteToken: string) {
  const form = new FormData();
  form.append('review_id', reviewId);
  form.append('delete_token', deleteToken);
  const res = await fetch('/api/reviews/delete', { method: 'POST', body: form });
  return res.json();
}

// ─── localStorage: remember reviews this browser authored so the user can delete them ───
const LS_KEY = 'uxory_review_tokens';

export function getOwnedTokens(): Record<string, string> {
  try {
    return JSON.parse(localStorage.getItem(LS_KEY) || '{}');
  } catch {
    return {};
  }
}

export function rememberOwnedReview(reviewId: string, deleteToken: string) {
  const tokens = getOwnedTokens();
  tokens[reviewId] = deleteToken;
  localStorage.setItem(LS_KEY, JSON.stringify(tokens));
}

export function forgetOwnedReview(reviewId: string) {
  const tokens = getOwnedTokens();
  delete tokens[reviewId];
  localStorage.setItem(LS_KEY, JSON.stringify(tokens));
}

// ─── Display helpers ───
export function initials(name: string): string {
  const parts = name.trim().split(/\s+/).filter(Boolean);
  if (parts.length === 0) return '?';
  if (parts.length === 1) return parts[0].slice(0, 2).toUpperCase();
  return (parts[0][0] + parts[parts.length - 1][0]).toUpperCase();
}

// Deterministic pleasant avatar background from a name (teal-leaning palette).
const AVATAR_COLORS = [
  '#12D8CC', '#0EA5A0', '#2DD4BF', '#0891B2', '#6366F1',
  '#8B5CF6', '#EC4899', '#F59E0B', '#10B981', '#3B82F6',
];
export function avatarColor(name: string): string {
  let hash = 0;
  for (let i = 0; i < name.length; i++) hash = (hash * 31 + name.charCodeAt(i)) >>> 0;
  return AVATAR_COLORS[hash % AVATAR_COLORS.length];
}

export function relativeTime(iso: string): string {
  const then = new Date(iso).getTime();
  const now = Date.now();
  const s = Math.max(1, Math.floor((now - then) / 1000));
  const units: [number, string][] = [
    [31536000, 'year'],
    [2592000, 'month'],
    [604800, 'week'],
    [86400, 'day'],
    [3600, 'hour'],
    [60, 'minute'],
  ];
  for (const [secs, label] of units) {
    const v = Math.floor(s / secs);
    if (v >= 1) return `${v} ${label}${v > 1 ? 's' : ''} ago`;
  }
  return 'just now';
}
