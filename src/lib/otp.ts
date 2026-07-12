import crypto from 'node:crypto';

/** Hash an OTP code with the server salt (shared by request + verify sides). */
export function hashCode(code: string): string {
  const salt = import.meta.env.RECAPTCHA_SECRET || process.env.RECAPTCHA_SECRET || 'otp_salt';
  return crypto.createHash('sha256').update(code + salt).digest('hex');
}
