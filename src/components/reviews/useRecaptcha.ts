import { useEffect, useRef, useState } from 'react';
import { RECAPTCHA_SITE_KEY } from './reviewsApi';

declare global {
  interface Window {
    grecaptcha?: {
      render: (el: HTMLElement, opts: { sitekey: string }) => number;
      getResponse: (id?: number) => string;
      reset: (id?: number) => void;
    };
  }
}

/**
 * Explicit-render reCAPTCHA v2 checkbox, matching the legacy behaviour.
 * The backend treats the captcha token as optional (honeypot is the primary
 * guard), so if the script is blocked the form still submits.
 */
export function useRecaptcha(active: boolean) {
  const containerRef = useRef<HTMLDivElement | null>(null);
  const widgetId = useRef<number | null>(null);
  const [ready, setReady] = useState(false);

  useEffect(() => {
    if (!active || !containerRef.current || widgetId.current !== null) return;
    let cancelled = false;
    const tryRender = () => {
      if (cancelled) return;
      if (window.grecaptcha?.render && containerRef.current && widgetId.current === null) {
        try {
          widgetId.current = window.grecaptcha.render(containerRef.current, { sitekey: RECAPTCHA_SITE_KEY });
          setReady(true);
        } catch {
          /* already rendered or unavailable - ignore */
        }
      } else {
        setTimeout(tryRender, 300);
      }
    };
    tryRender();
    return () => {
      cancelled = true;
    };
  }, [active]);

  const getToken = () => {
    try {
      return window.grecaptcha && widgetId.current !== null
        ? window.grecaptcha.getResponse(widgetId.current)
        : '';
    } catch {
      return '';
    }
  };

  const reset = () => {
    try {
      if (window.grecaptcha && widgetId.current !== null) window.grecaptcha.reset(widgetId.current);
    } catch {
      /* ignore */
    }
  };

  return { containerRef, getToken, reset, ready };
}
