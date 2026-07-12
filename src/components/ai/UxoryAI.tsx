import React, { useEffect, useRef, useState } from 'react';
import ReactMarkdown from 'react-markdown';
import AnimatedGradientBackground from './AnimatedGradientBackground';

interface Message {
  role: 'user' | 'assistant';
  content: string;
}

const SUGGESTIONS = [
  'What can Uxory build for my business?',
  'How much does a custom website cost?',
  'What is an AI agent, in simple terms?',
  'Should I use Shopify or a custom store?',
];

const STORAGE_KEY = 'uxory_ai_chat';

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

  // Gemini-style interactive glow that follows the cursor over the hero.
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
    <div className="relative min-h-[calc(100vh-80px)] flex flex-col">
      {/* Ambient animated gradient + interactive cursor glow, edge-masked so it
          blends smoothly into the nav above and footer below. */}
      <div ref={bgRef} className="absolute inset-0 overflow-hidden pointer-events-none">
        <AnimatedGradientBackground Breathing containerClassName="opacity-45 dark:opacity-65" />
        <div
          className="absolute inset-0 transition-opacity duration-500"
          style={{
            background:
              'radial-gradient(500px circle at var(--mx, 50%) var(--my, 22%), rgba(18,216,204,0.16), transparent 55%)',
          }}
        />
        <div className="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-backgroundBody dark:from-[#0b0b0b] to-transparent" />
        <div className="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-backgroundBody dark:from-[#0b0b0b] to-transparent" />
      </div>

      <div className="relative z-10 flex-1 flex flex-col max-w-3xl w-full mx-auto px-4">
        {!started ? (
          // ── Landing state ──
          <div className="flex-1 flex flex-col items-center justify-center text-center py-16">
            <h1 className="text-5xl md:text-6xl font-medium tracking-tight">
              <span className="bg-gradient-to-r from-primary via-teal-300 to-primary bg-clip-text text-transparent">
                Hello, I’m Uxory AI
              </span>
            </h1>
            <p className="mt-4 text-lg text-secondary/60 dark:text-backgroundBody/60 max-w-md">
              Ask me anything about building software, websites, AI agents, or how Uxory can help your business.
            </p>

            <div className="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-3 w-full max-w-xl">
              {SUGGESTIONS.map((s) => (
                <button
                  key={s}
                  onClick={() => send(s)}
                  className="text-left text-sm px-4 py-3 rounded-2xl border border-secondary/10 dark:border-backgroundBody/10 bg-white/40 dark:bg-white/[0.04] backdrop-blur hover:border-primary/50 transition-colors"
                >
                  {s}
                </button>
              ))}
            </div>
          </div>
        ) : (
          // ── Chat state ──
          <div ref={scrollRef} className="flex-1 overflow-y-auto py-8 space-y-6">
            {messages.map((m, i) => (
              <div key={i} className={`flex gap-3 ${m.role === 'user' ? 'justify-end' : 'justify-start'}`}>
                {m.role === 'assistant' && (
                  <div className="w-8 h-8 rounded-full bg-primary/15 flex items-center justify-center shrink-0 text-primary font-semibold text-sm">
                    U
                  </div>
                )}
                <div
                  className={`max-w-[85%] px-4 py-3 rounded-2xl ${
                    m.role === 'user'
                      ? 'bg-primary text-black rounded-br-sm'
                      : 'bg-secondary/5 dark:bg-backgroundBody/[0.06] rounded-bl-sm'
                  }`}
                >
                  {m.role === 'assistant' ? (
                    m.content ? (
                      <div className="prose-uxory text-[15px] leading-relaxed">
                        <ReactMarkdown>{m.content}</ReactMarkdown>
                      </div>
                    ) : (
                      <TypingDots />
                    )
                  ) : (
                    <p className="text-[15px] leading-relaxed whitespace-pre-wrap">{m.content}</p>
                  )}
                </div>
              </div>
            ))}
          </div>
        )}

        {/* Input bar */}
        <div className="sticky bottom-0 pb-6 pt-3 bg-backgroundBody/70 dark:bg-[#0b0b0b]/70 backdrop-blur-md">
          {started && (
            <div className="flex justify-center mb-3">
              <button
                onClick={newChat}
                className="text-xs text-secondary/50 dark:text-backgroundBody/50 hover:text-primary transition-colors"
              >
                + New chat
              </button>
            </div>
          )}
          <div className="flex items-end gap-2 bg-white dark:bg-white/[0.06] border border-secondary/15 dark:border-backgroundBody/15 rounded-3xl px-4 py-2 shadow-lg">
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
              className="flex-1 resize-none bg-transparent py-2 focus:outline-none text-[15px] max-h-[200px]"
            />
            <button
              onClick={() => send(input)}
              disabled={!input.trim() || streaming}
              aria-label="Send"
              className="w-9 h-9 shrink-0 rounded-full bg-primary text-black flex items-center justify-center disabled:opacity-40 hover:opacity-90 transition-opacity"
            >
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                <path strokeLinecap="round" strokeLinejoin="round" d="M12 19V5M5 12l7-7 7 7" />
              </svg>
            </button>
          </div>
          <p className="text-center text-[11px] text-secondary/40 dark:text-backgroundBody/40 mt-2">
            Uxory AI can make mistakes. No account needed — chats are private to this browser session.
          </p>
        </div>
      </div>
    </div>
  );
}

function TypingDots() {
  return (
    <div className="flex gap-1 py-1">
      {[0, 1, 2].map((i) => (
        <span
          key={i}
          className="w-2 h-2 rounded-full bg-secondary/40 dark:bg-backgroundBody/40 animate-bounce"
          style={{ animationDelay: `${i * 0.15}s` }}
        />
      ))}
    </div>
  );
}
