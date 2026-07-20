import React, { useEffect, useRef, useState } from 'react';
import ReactMarkdown from 'react-markdown';

interface Message {
  role: 'user' | 'assistant';
  content: string;
}

const SUGGESTIONS: { label: string; icon: string }[] = [
  { label: 'What can Uxory build for my business?', icon: 'M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8-5-3.6-5 3.6 1.9-5.8L4 8.8h6.1z' },
  { label: 'How much does a custom website cost?', icon: 'M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6' },
  { label: 'What is an AI agent, in simple terms?', icon: 'M12 8V4m0 0H8m4 0h4M5 12a7 7 0 0114 0v5a3 3 0 01-3 3H8a3 3 0 01-3-3v-5zM9 14h.01M15 14h.01' },
  { label: 'Should I use Shopify or a custom store?', icon: 'M6 6h15l-1.5 8.5H8L6 3H3M9 20a1 1 0 100-2 1 1 0 000 2zm9 0a1 1 0 100-2 1 1 0 000 2z' },
];

const STORAGE_KEY = 'uxory_ai_chat';

/** Uxory's four-point spark - the assistant mark. */
function Spark({ size = 20, className = '' }: { size?: number; className?: string }) {
  return (
    <svg width={size} height={size} viewBox="0 0 40 40" fill="none" className={className} aria-hidden="true">
      <path
        d="M20 0C20 0 19.8 11.2 24.3 15.7C28.8 20.2 40 20 40 20C40 20 28.8 19.8 24.3 24.3C19.8 28.8 20 40 20 40C20 40 20.2 28.8 15.7 24.3C11.2 19.8 0 20 0 20C0 20 11.2 20.2 15.7 15.7C20.2 11.2 20 0 20 0Z"
        fill="currentColor"
      />
    </svg>
  );
}

export default function UxoryAI() {
  const [messages, setMessages] = useState<Message[]>([]);
  const [input, setInput] = useState('');
  const [streaming, setStreaming] = useState(false);
  const scrollRef = useRef<HTMLDivElement | null>(null);
  const taRef = useRef<HTMLTextAreaElement | null>(null);

  useEffect(() => {
    try {
      const saved = sessionStorage.getItem(STORAGE_KEY);
      if (saved) setMessages(JSON.parse(saved));
    } catch {
      /* ignore */
    }
  }, []);

  useEffect(() => {
    try {
      sessionStorage.setItem(STORAGE_KEY, JSON.stringify(messages));
    } catch {
      /* ignore */
    }
    scrollRef.current?.scrollTo({ top: scrollRef.current.scrollHeight, behavior: 'smooth' });
  }, [messages]);

  const started = messages.length > 0;

  async function send(text: string) {
    const content = text.trim();
    if (!content || streaming) return;
    setInput('');
    if (taRef.current) taRef.current.style.height = 'auto';

    const next: Message[] = [...messages, { role: 'user', content }];
    setMessages(next);
    setStreaming(true);
    setMessages((m) => [...m, { role: 'assistant', content: '' }]);

    try {
      const res = await fetch('/api/chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ messages: next }),
      });

      if (!res.ok || !res.body) {
        let msg = 'Something went wrong. Please try again.';
        try {
          const err = await res.json();
          if (err?.error) msg = err.error;
        } catch {
          /* ignore */
        }
        setMessages((m) => {
          const copy = [...m];
          copy[copy.length - 1] = { role: 'assistant', content: `⚠️ ${msg}` };
          return copy;
        });
        setStreaming(false);
        return;
      }

      const reader = res.body.getReader();
      const decoder = new TextDecoder();
      let buffer = '';
      let acc = '';

      // eslint-disable-next-line no-constant-condition
      while (true) {
        const { done, value } = await reader.read();
        if (done) break;
        buffer += decoder.decode(value, { stream: true });
        const lines = buffer.split('\n');
        buffer = lines.pop() || '';
        for (const line of lines) {
          const l = line.trim();
          if (!l.startsWith('data:')) continue;
          const data = l.slice(5).trim();
          if (!data || data === '[DONE]') continue;
          try {
            const obj = JSON.parse(data);
            if (obj.text) {
              acc += obj.text;
              setMessages((m) => {
                const copy = [...m];
                copy[copy.length - 1] = { role: 'assistant', content: acc };
                return copy;
              });
            }
          } catch {
            /* skip */
          }
        }
      }
      if (!acc) {
        setMessages((m) => {
          const copy = [...m];
          copy[copy.length - 1] = { role: 'assistant', content: 'Sorry, I didn’t catch that. Could you rephrase?' };
          return copy;
        });
      }
    } catch {
      setMessages((m) => {
        const copy = [...m];
        copy[copy.length - 1] = { role: 'assistant', content: '⚠️ Network error. Please try again.' };
        return copy;
      });
    } finally {
      setStreaming(false);
    }
  }

  function newChat() {
    setMessages([]);
    sessionStorage.removeItem(STORAGE_KEY);
  }

  function onInputKey(e: React.KeyboardEvent<HTMLTextAreaElement>) {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      send(input);
    }
  }

  function autoGrow() {
    const ta = taRef.current;
    if (!ta) return;
    ta.style.height = 'auto';
    ta.style.height = Math.min(ta.scrollHeight, 200) + 'px';
  }

  return (
    <div className="ai-root relative flex h-[100svh] min-h-[560px] flex-col overflow-hidden pt-[72px]">
      <style>{`
        .ai-root {
          --ai-bg: #f5f7fa;
          --ai-text: #16181d;
          --ai-muted: rgba(22,24,29,0.56);
          --ai-faint: rgba(22,24,29,0.4);
          --ai-surface: #ffffff;
          --ai-surface-2: #ffffff;
          --ai-border: rgba(22,24,29,0.1);
          --ai-user-bg: #16181d;
          --ai-user-text: #ffffff;
          --ai-glow: rgba(18,216,204,0.14);
          --ai-code-bg: rgba(18,216,204,0.12);
          background-color: var(--ai-bg);
          color: var(--ai-text);
        }
        :is(.dark) .ai-root {
          --ai-bg: #0b0d0f;
          --ai-text: #e9edf0;
          --ai-muted: rgba(233,237,240,0.56);
          --ai-faint: rgba(233,237,240,0.38);
          --ai-surface: rgba(255,255,255,0.05);
          --ai-surface-2: rgba(255,255,255,0.08);
          --ai-border: rgba(255,255,255,0.1);
          --ai-user-bg: rgba(255,255,255,0.09);
          --ai-user-text: #e9edf0;
          --ai-glow: rgba(18,216,204,0.2);
          --ai-code-bg: rgba(18,216,204,0.16);
        }

        @keyframes ai-pan { 0%,100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        @keyframes ai-rise { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes ai-breathe { 0%,100% { opacity: .75; transform: scale(1); } 50% { opacity: 1; transform: scale(1.06); } }
        @keyframes ai-shimmer { 0% { background-position: -180% 0; } 100% { background-position: 180% 0; } }
        @keyframes ai-spin { 0% { transform: rotate(0) scale(1); } 50% { transform: rotate(180deg) scale(1.12); } 100% { transform: rotate(360deg) scale(1); } }

        .ai-greet {
          background: linear-gradient(90deg,#0aa89e,#12d8cc,#3b82f6,#0aa89e);
          background-size: 300% 100%;
          -webkit-background-clip: text; background-clip: text; color: transparent;
          animation: ai-pan 9s ease-in-out infinite;
        }
        .ai-rise { animation: ai-rise .65s cubic-bezier(.16,1,.3,1) both; }
        .ai-glow-orb { animation: ai-breathe 7s ease-in-out infinite; }
        .ai-think-bar {
          background: linear-gradient(90deg, var(--ai-border) 20%, var(--ai-glow) 50%, var(--ai-border) 80%);
          background-size: 200% 100%;
          animation: ai-shimmer 1.5s linear infinite;
        }
        .ai-spin { animation: ai-spin 1.5s ease-in-out infinite; }
        .ai-scroll::-webkit-scrollbar { width: 8px; }
        .ai-scroll::-webkit-scrollbar-thumb { background: var(--ai-border); border-radius: 999px; }

        /* Markdown */
        /* set colour on the descendants too - the site's global p/li{color}
           rule beats a colour merely inherited from .prose-ai. */
        .prose-ai, .prose-ai p, .prose-ai li, .prose-ai h1, .prose-ai h2, .prose-ai h3 { color: var(--ai-text); }
        .prose-ai p { margin: 0 0 .7rem; }
        .prose-ai p:last-child { margin-bottom: 0; }
        .prose-ai ul { list-style: disc; padding-left: 1.2rem; margin: 0 0 .7rem; }
        .prose-ai ol { list-style: decimal; padding-left: 1.2rem; margin: 0 0 .7rem; }
        .prose-ai li { margin: .15rem 0; }
        .prose-ai a { color: #0aa89e; text-decoration: underline; }
        :is(.dark) .prose-ai a { color: #2fe0d3; }
        .prose-ai strong { font-weight: 600; color: var(--ai-text); }
        .prose-ai code { background: var(--ai-code-bg); padding: .1rem .35rem; border-radius: 6px; font-size: .9em; }
        .prose-ai pre { background: var(--ai-code-bg); padding: .75rem; border-radius: 10px; overflow-x: auto; margin: 0 0 .7rem; }
        .prose-ai h1, .prose-ai h2, .prose-ai h3 { font-weight: 600; margin: .8rem 0 .3rem; line-height: 1.3; }
        .prose-ai h1 { font-size: 1.2rem; }
        .prose-ai h2 { font-size: 1.08rem; }
        .prose-ai h3 { font-size: 1rem; }
      `}</style>

      {/* Ambient glow - top only, fades before the input so nothing collides at the bottom */}
      <div className="pointer-events-none absolute inset-x-0 top-0 h-[55%] overflow-hidden">
        <div
          className="ai-glow-orb absolute left-1/2 top-[-30%] h-[520px] w-[720px] -translate-x-1/2 rounded-full blur-[90px]"
          style={{ background: 'radial-gradient(circle, var(--ai-glow), transparent 68%)' }}
        />
      </div>

      <div className="relative z-10 mx-auto flex w-full min-h-0 max-w-3xl flex-1 flex-col overflow-hidden px-4">
        {!started ? (
          /* ── Landing ── (min-h-0 + scroll so the input is never pushed off-screen on short/mobile viewports) */
          <div className="flex min-h-0 flex-1 flex-col items-center justify-center overflow-y-auto py-6 text-center">
            <div className="ai-rise mb-5 flex h-12 w-12 items-center justify-center rounded-2xl md:h-14 md:w-14" style={{ background: 'var(--ai-code-bg)' }}>
              <Spark size={28} className="text-primary" />
            </div>
            <h1 className="text-[30px] font-medium leading-[1.15] tracking-tight sm:text-[38px] md:text-5xl">
              <span className="ai-rise ai-greet block">Hello, I’m Uxory AI</span>
              <span className="ai-rise block" style={{ color: 'var(--ai-faint)', animationDelay: '.2s' }}>
                How can I help you today?
              </span>
            </h1>

            <div className="mt-7 grid w-full max-w-2xl grid-cols-1 gap-2.5 sm:mt-11 sm:grid-cols-2 sm:gap-3">
              {SUGGESTIONS.map((s, i) => (
                <button
                  key={s.label}
                  onClick={() => send(s.label)}
                  className="ai-rise group flex items-center gap-3 rounded-2xl border p-3.5 text-left transition-all duration-300 hover:-translate-y-0.5 md:p-4"
                  style={{
                    background: 'var(--ai-surface)',
                    borderColor: 'var(--ai-border)',
                    animationDelay: `${0.35 + i * 0.07}s`,
                  }}
                >
                  <span
                    className="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-primary transition-colors group-hover:bg-primary group-hover:text-black"
                    style={{ background: 'var(--ai-code-bg)' }}
                  >
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7">
                      <path d={s.icon} strokeLinecap="round" strokeLinejoin="round" />
                    </svg>
                  </span>
                  <span className="text-[14.5px] leading-snug" style={{ color: 'var(--ai-text)' }}>
                    {s.label}
                  </span>
                </button>
              ))}
            </div>
          </div>
        ) : (
          /* ── Conversation ── */
          <div ref={scrollRef} className="ai-scroll min-h-0 flex-1 space-y-7 overflow-y-auto py-8">
            {messages.map((m, i) =>
              m.role === 'user' ? (
                <div key={i} className="ai-rise flex justify-end">
                  <div
                    className="max-w-[85%] rounded-3xl rounded-br-lg px-5 py-3"
                    style={{ background: 'var(--ai-user-bg)' }}
                  >
                    {/* colour set on the <p> itself: the site's global p{color}
                        rule otherwise overrides an inherited colour. */}
                    <p className="whitespace-pre-wrap text-[15px] leading-relaxed" style={{ color: 'var(--ai-user-text)' }}>
                      {m.content}
                    </p>
                  </div>
                </div>
              ) : (
                <div key={i} className="ai-rise flex gap-4">
                  <span
                    className={`mt-0.5 shrink-0 text-primary ${
                      streaming && i === messages.length - 1 && !m.content ? 'ai-spin' : ''
                    }`}
                  >
                    <Spark size={22} />
                  </span>
                  <div className="min-w-0 flex-1 pt-0.5">
                    {m.content ? (
                      <div className="prose-ai text-[15px] leading-relaxed">
                        <ReactMarkdown>{m.content}</ReactMarkdown>
                      </div>
                    ) : (
                      <div className="space-y-2.5 pt-1">
                        <div className="ai-think-bar h-3.5 w-3/4 rounded-full" />
                        <div className="ai-think-bar h-3.5 w-1/2 rounded-full" />
                        <div className="ai-think-bar h-3.5 w-2/3 rounded-full" />
                      </div>
                    )}
                  </div>
                </div>
              )
            )}
          </div>
        )}

        {/* ── Input ── */}
        <div className="relative pb-5 pt-2">
          {/* scrim fades messages into the page bg - matches theme exactly, so no band */}
          <div
            className="pointer-events-none absolute inset-x-0 -top-12 bottom-0"
            style={{ background: 'linear-gradient(to top, var(--ai-bg) 55%, transparent)' }}
          />
          <div className="relative flex items-end gap-2.5">
            {started && (
              <button
                onClick={newChat}
                title="New chat"
                aria-label="New chat"
                className="mb-1 flex h-11 w-11 shrink-0 items-center justify-center rounded-full border transition-colors hover:border-primary/60 hover:text-primary"
                style={{ background: 'var(--ai-surface)', borderColor: 'var(--ai-border)', color: 'var(--ai-muted)' }}
              >
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" d="M12 5v14M5 12h14" />
                </svg>
              </button>
            )}
            <div
              className="flex flex-1 items-end gap-2 rounded-[26px] border px-5 py-2 shadow-[0_8px_30px_-14px_rgba(0,0,0,0.35)] transition-colors focus-within:border-primary/60"
              style={{ background: 'var(--ai-surface)', borderColor: 'var(--ai-border)' }}
            >
              <textarea
                ref={taRef}
                rows={1}
                value={input}
                onChange={(e) => {
                  setInput(e.target.value);
                  autoGrow();
                }}
                onKeyDown={onInputKey}
                placeholder="Ask Uxory AI…"
                className="max-h-[200px] flex-1 resize-none bg-transparent py-2.5 text-[15px] outline-none"
                style={{ color: 'var(--ai-text)' }}
              />
              <button
                onClick={() => send(input)}
                disabled={!input.trim() || streaming}
                aria-label="Send"
                className={`mb-1 flex h-9 w-9 shrink-0 items-center justify-center rounded-full transition-all duration-200 ${
                  input.trim() && !streaming ? 'bg-primary text-black hover:opacity-90' : ''
                }`}
                style={input.trim() && !streaming ? undefined : { background: 'var(--ai-code-bg)', color: 'var(--ai-faint)' }}
              >
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 19V5M5 12l7-7 7 7" />
                </svg>
              </button>
            </div>
          </div>
          <p className="relative mt-2.5 text-center text-[11px]" style={{ color: 'var(--ai-faint)' }}>
            Uxory AI can make mistakes. No account needed - chats stay private to this browser session.
          </p>
        </div>
      </div>
    </div>
  );
}
