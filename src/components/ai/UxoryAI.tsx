import React, { useEffect, useRef, useState } from 'react';
import ReactMarkdown from 'react-markdown';
import AnimatedGradientBackground from './AnimatedGradientBackground';

interface Message {
  role: 'user' | 'assistant';
  content: string;
}

const SUGGESTIONS: { label: string; hint: string; icon: string }[] = [
  { label: 'What can Uxory build for my business?', hint: 'Explore', icon: 'M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8-5-3.6-5 3.6 1.9-5.8L4 8.8h6.1z' },
  { label: 'How much does a custom website cost?', hint: 'Pricing', icon: 'M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6' },
  { label: 'What is an AI agent, in simple terms?', hint: 'Learn', icon: 'M12 8V4m0 0H8m4 0h4M5 12a7 7 0 0114 0v5a3 3 0 01-3 3H8a3 3 0 01-3-3v-5zM9 14h.01M15 14h.01' },
  { label: 'Should I use Shopify or a custom store?', hint: 'Compare', icon: 'M6 6h15l-1.5 8.5H8L6 3H3M9 20a1 1 0 100-2 1 1 0 000 2zm9 0a1 1 0 100-2 1 1 0 000 2z' },
];

const STORAGE_KEY = 'uxory_ai_chat';

/** Four-point spark - Uxory's mark, used as the assistant avatar. */
function Spark({ size = 18, className = '' }: { size?: number; className?: string }) {
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

  // Restore anonymous session from sessionStorage
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
    // Placeholder assistant message we stream into
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

  // Interactive glow that follows the cursor (Gemini-style ambient light).
  const bgRef = useRef<HTMLDivElement | null>(null);
  useEffect(() => {
    function onMove(e: PointerEvent) {
      const el = bgRef.current;
      if (!el) return;
      const r = el.getBoundingClientRect();
      el.style.setProperty('--mx', `${((e.clientX - r.left) / r.width) * 100}%`);
      el.style.setProperty('--my', `${((e.clientY - r.top) / r.height) * 100}%`);
    }
    window.addEventListener('pointermove', onMove);
    return () => window.removeEventListener('pointermove', onMove);
  }, []);

  return (
    <div className="relative flex h-[100svh] min-h-[600px] flex-col overflow-hidden bg-[#0A0A0A] pt-[76px] text-white">
      {/* Gemini-style motion, in Uxory teal */}
      <style>{`
        @keyframes ux-gradient-pan {
          0% { background-position: 0% 50%; }
          50% { background-position: 100% 50%; }
          100% { background-position: 0% 50%; }
        }
        @keyframes ux-rise {
          from { opacity: 0; transform: translateY(18px); }
          to { opacity: 1; transform: translateY(0); }
        }
        @keyframes ux-shimmer {
          0% { background-position: -200% 0; }
          100% { background-position: 200% 0; }
        }
        @keyframes ux-spark-spin {
          0% { transform: rotate(0deg) scale(1); }
          50% { transform: rotate(180deg) scale(1.15); }
          100% { transform: rotate(360deg) scale(1); }
        }
        .ux-greet {
          background: linear-gradient(90deg, #12d8cc, #7ff5ea, #4f9cf9, #12d8cc);
          background-size: 300% 100%;
          -webkit-background-clip: text;
          background-clip: text;
          color: transparent;
          animation: ux-gradient-pan 8s ease-in-out infinite;
        }
        .ux-rise { animation: ux-rise 0.7s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .ux-msg-in { animation: ux-rise 0.4s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .ux-shimmer-bar {
          background: linear-gradient(90deg, rgba(255,255,255,0.05) 25%, rgba(18,216,204,0.22) 50%, rgba(255,255,255,0.05) 75%);
          background-size: 200% 100%;
          animation: ux-shimmer 1.6s linear infinite;
        }
        .ux-spark-think { animation: ux-spark-spin 1.6s ease-in-out infinite; }
      `}</style>

      {/* Ambient background */}
      <div ref={bgRef} className="pointer-events-none absolute inset-0 overflow-hidden">
        <AnimatedGradientBackground Breathing startingGap={125} breathingRange={6} animationSpeed={0.02} />
        <div
          className="absolute inset-0"
          style={{
            background:
              'radial-gradient(600px circle at var(--mx, 50%) var(--my, 20%), rgba(18,216,204,0.14), transparent 60%)',
          }}
        />
      </div>

      <div className="relative z-10 mx-auto flex w-full max-w-3xl flex-1 flex-col overflow-hidden px-4">
        {!started ? (
          // ── Landing (Gemini-style greeting) ──
          <div className="flex flex-1 flex-col items-center justify-center pb-10 text-center">
            <h1 className="text-[42px] font-medium leading-[1.15] tracking-tight md:text-6xl">
              <span className="ux-rise ux-greet block">Hello, I’m Uxory AI</span>
              <span className="ux-rise block text-white/40" style={{ animationDelay: '0.25s' }}>
                How can I help you today?
              </span>
            </h1>

            <div className="mt-12 grid w-full max-w-2xl grid-cols-1 gap-3 sm:grid-cols-2">
              {SUGGESTIONS.map((s, i) => (
                <button
                  key={s.label}
                  onClick={() => send(s.label)}
                  className="ux-rise group flex min-h-[110px] flex-col justify-between rounded-2xl border border-white/10 bg-white/[0.04] p-4 text-left backdrop-blur transition-all duration-300 hover:-translate-y-0.5 hover:border-primary/50 hover:bg-white/[0.07]"
                  style={{ animationDelay: `${0.45 + i * 0.08}s` }}
                >
                  <span className="text-[15px] leading-snug text-white/85">{s.label}</span>
                  <span className="mt-3 flex items-center justify-between">
                    <span className="text-[11px] uppercase tracking-[1.5px] text-white/35">{s.hint}</span>
                    <span className="flex h-8 w-8 items-center justify-center rounded-full bg-white/[0.06] text-primary transition-colors group-hover:bg-primary group-hover:text-black">
                      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                        <path d={s.icon} strokeLinecap="round" strokeLinejoin="round" />
                      </svg>
                    </span>
                  </span>
                </button>
              ))}
            </div>
          </div>
        ) : (
          // ── Conversation ──
          <div ref={scrollRef} className="flex-1 space-y-7 overflow-y-auto py-8 [scrollbar-width:thin]">
            {messages.map((m, i) =>
              m.role === 'user' ? (
                <div key={i} className="ux-msg-in flex justify-end">
                  <div className="max-w-[85%] rounded-3xl rounded-br-lg bg-white/[0.08] px-5 py-3">
                    <p className="whitespace-pre-wrap text-[15px] leading-relaxed text-white/90">{m.content}</p>
                  </div>
                </div>
              ) : (
                <div key={i} className="ux-msg-in flex gap-4">
                  <div
                    className={`mt-0.5 shrink-0 text-primary ${
                      streaming && i === messages.length - 1 && !m.content ? 'ux-spark-think' : ''
                    }`}
                  >
                    <Spark size={22} />
                  </div>
                  <div className="min-w-0 flex-1">
                    {m.content ? (
                      <div className="prose-uxory text-[15px] leading-relaxed text-white/85">
                        <ReactMarkdown>{m.content}</ReactMarkdown>
                      </div>
                    ) : (
                      <div className="space-y-2.5 pt-1">
                        <div className="ux-shimmer-bar h-3.5 w-3/4 rounded-full" />
                        <div className="ux-shimmer-bar h-3.5 w-1/2 rounded-full" style={{ animationDelay: '0.2s' }} />
                        <div className="ux-shimmer-bar h-3.5 w-2/3 rounded-full" style={{ animationDelay: '0.4s' }} />
                      </div>
                    )}
                  </div>
                </div>
              )
            )}
          </div>
        )}

        {/* ── Input bar ── */}
        <div className="relative pb-5 pt-2">
          <div className="pointer-events-none absolute inset-x-0 -top-10 bottom-0 bg-gradient-to-t from-[#0A0A0A] via-[#0A0A0A]/85 to-transparent" />
          <div className="relative flex items-end gap-2.5">
            {started && (
              <button
                onClick={newChat}
                title="New chat"
                aria-label="New chat"
                className="mb-1 flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-white/10 bg-white/[0.05] text-white/60 backdrop-blur transition-colors hover:border-primary/50 hover:text-primary"
              >
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" d="M12 5v14M5 12h14" />
                </svg>
              </button>
            )}
            <div className="flex flex-1 items-end gap-2 rounded-[28px] border border-white/12 bg-white/[0.06] px-5 py-2 shadow-[0_10px_40px_-12px_rgba(0,0,0,0.8)] backdrop-blur-md transition-colors focus-within:border-primary/50">
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
                className="max-h-[200px] flex-1 resize-none bg-transparent py-2.5 text-[15px] text-white outline-none placeholder:text-white/35"
              />
              <button
                onClick={() => send(input)}
                disabled={!input.trim() || streaming}
                aria-label="Send"
                className={`mb-1 flex h-9 w-9 shrink-0 items-center justify-center rounded-full transition-all duration-200 ${
                  input.trim() && !streaming
                    ? 'bg-primary text-black hover:opacity-90'
                    : 'bg-white/[0.07] text-white/25'
                }`}
              >
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 19V5M5 12l7-7 7 7" />
                </svg>
              </button>
            </div>
          </div>
          <p className="relative mt-2.5 text-center text-[11px] text-white/35">
            Uxory AI can make mistakes. No account needed - chats stay private to this browser session.
          </p>
        </div>
      </div>
    </div>
  );
}
