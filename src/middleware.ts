import type { MiddlewareHandler } from 'astro';
import ws from 'ws';

// @supabase/supabase-js constructs a RealtimeClient inside createClient(), which
// requires a global WebSocket. Vercel runs our functions on Node 20 (the highest
// runtime this Astro-4 Vercel adapter can emit), and Node 20 has no native
// WebSocket — so createClient() throws "Node.js 20 detected without native
// WebSocket support". Polyfilling the global here (once, at module load) fixes it
// for every API route without touching each createClient call.
if (typeof (globalThis as { WebSocket?: unknown }).WebSocket === 'undefined') {
  (globalThis as { WebSocket?: unknown }).WebSocket = ws;
}

export const onRequest: MiddlewareHandler = (_context, next) => next();
