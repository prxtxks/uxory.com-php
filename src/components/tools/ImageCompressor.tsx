import React, { useCallback, useRef, useState } from 'react';
import imageCompression from 'browser-image-compression';
import JSZip from 'jszip';

type Preset = 'extreme' | 'recommended' | 'less';
type OutFormat = 'original' | 'webp' | 'jpeg';

const PRESETS: Record<Preset, { label: string; quality: number; hint: string }> = {
  extreme: { label: 'Extreme', quality: 0.5, hint: 'Smallest files' },
  recommended: { label: 'Recommended', quality: 0.72, hint: 'Best balance' },
  less: { label: 'Less', quality: 0.85, hint: 'Higher quality' },
};

const MAX_FILES = 20;
const MAX_BYTES = 25 * 1024 * 1024; // 25MB per file
const ACCEPTED = ['image/jpeg', 'image/png', 'image/webp'];

interface Item {
  id: string;
  file: File;
  originalSize: number;
  status: 'pending' | 'done' | 'error';
  compressed?: Blob;
  compressedSize?: number;
  outName?: string;
  previewUrl: string;
  error?: string;
}

function humanSize(bytes: number): string {
  if (bytes < 1024) return `${bytes} B`;
  if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(0)} KB`;
  return `${(bytes / 1024 / 1024).toFixed(2)} MB`;
}

let idCounter = 0;

export default function ImageCompressor() {
  const [items, setItems] = useState<Item[]>([]);
  const [preset, setPreset] = useState<Preset>('recommended');
  const [outFormat, setOutFormat] = useState<OutFormat>('original');
  const [resize, setResize] = useState(false);
  const [maxDimension, setMaxDimension] = useState(1920);
  const [working, setWorking] = useState(false);
  const [dragOver, setDragOver] = useState(false);
  const inputRef = useRef<HTMLInputElement | null>(null);

  const addFiles = useCallback((fileList: FileList | File[]) => {
    const incoming = Array.from(fileList).filter((f) => ACCEPTED.includes(f.type) && f.size <= MAX_BYTES);
    setItems((prev) => {
      const room = MAX_FILES - prev.length;
      const next = incoming.slice(0, room).map((file) => ({
        id: `f${++idCounter}`,
        file,
        originalSize: file.size,
        status: 'pending' as const,
        previewUrl: URL.createObjectURL(file),
      }));
      return [...prev, ...next];
    });
  }, []);

  const onDrop = (e: React.DragEvent) => {
    e.preventDefault();
    setDragOver(false);
    if (e.dataTransfer.files?.length) addFiles(e.dataTransfer.files);
  };

  async function compressAll() {
    setWorking(true);
    const fileType = outFormat === 'webp' ? 'image/webp' : outFormat === 'jpeg' ? 'image/jpeg' : undefined;
    const ext = outFormat === 'webp' ? '.webp' : outFormat === 'jpeg' ? '.jpg' : '';

    // Process sequentially to keep memory/UI predictable across many files.
    for (const item of items) {
      if (item.status === 'done') continue;
      try {
        const options: Parameters<typeof imageCompression>[1] = {
          useWebWorker: true,
          initialQuality: PRESETS[preset].quality,
          maxSizeMB: 100, // effectively unbounded; quality drives compression
          ...(resize ? { maxWidthOrHeight: maxDimension } : {}),
          ...(fileType ? { fileType } : {}),
        };
        let blob: Blob = await imageCompression(item.file, options);
        // Never inflate: if re-encoding produced a larger file (e.g. the source
        // was already well-optimized) and we're not converting format, keep the
        // original bytes so the tool can only ever shrink or break even.
        const sameFormat = outFormat === 'original';
        if (sameFormat && blob.size >= item.originalSize) {
          blob = item.file;
        }
        const origExt = item.file.name.split('.').pop() || 'img';
        const baseName = item.file.name.replace(/\.[^.]+$/, '');
        const outName = ext ? `${baseName}-min${ext}` : `${baseName}-min.${origExt}`;
        setItems((prev) =>
          prev.map((it) =>
            it.id === item.id
              ? { ...it, status: 'done', compressed: blob, compressedSize: blob.size, outName }
              : it,
          ),
        );
      } catch (err) {
        setItems((prev) =>
          prev.map((it) =>
            it.id === item.id ? { ...it, status: 'error', error: (err as Error).message } : it,
          ),
        );
      }
    }
    setWorking(false);
  }

  function downloadOne(item: Item) {
    if (!item.compressed || !item.outName) return;
    const url = URL.createObjectURL(item.compressed);
    const a = document.createElement('a');
    a.href = url;
    a.download = item.outName;
    a.click();
    setTimeout(() => URL.revokeObjectURL(url), 1000);
  }

  async function downloadZip() {
    const zip = new JSZip();
    items.filter((i) => i.compressed && i.outName).forEach((i) => zip.file(i.outName!, i.compressed!));
    const blob = await zip.generateAsync({ type: 'blob' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'uxory-compressed-images.zip';
    a.click();
    setTimeout(() => URL.revokeObjectURL(url), 1000);
  }

  function removeItem(id: string) {
    setItems((prev) => {
      const target = prev.find((i) => i.id === id);
      if (target) URL.revokeObjectURL(target.previewUrl);
      return prev.filter((i) => i.id !== id);
    });
  }

  function reset() {
    items.forEach((i) => URL.revokeObjectURL(i.previewUrl));
    setItems([]);
  }

  const doneItems = items.filter((i) => i.status === 'done');
  const totalOriginal = items.reduce((s, i) => s + i.originalSize, 0);
  const totalCompressed = doneItems.reduce((s, i) => s + (i.compressedSize || 0), 0);
  const totalSaved = totalOriginal && totalCompressed ? Math.round((1 - totalCompressed / totalOriginal) * 100) : 0;

  return (
    <div className="max-w-[820px] mx-auto">
      {/* Options */}
      <div className="flex flex-wrap items-center gap-3 mb-6">
        <div className="flex gap-2">
          {(Object.keys(PRESETS) as Preset[]).map((p) => (
            <button
              key={p}
              onClick={() => setPreset(p)}
              className={`px-4 py-2 rounded-full text-sm border transition-colors ${
                preset === p
                  ? 'bg-primary/15 text-primary border-primary'
                  : 'border-secondary/15 dark:border-backgroundBody/15 text-secondary/70 dark:text-backgroundBody/70 hover:border-primary/50'
              }`}
              title={PRESETS[p].hint}
            >
              {PRESETS[p].label}
            </button>
          ))}
        </div>

        <select
          value={outFormat}
          onChange={(e) => setOutFormat(e.target.value as OutFormat)}
          className="px-3 py-2 rounded-full text-sm border border-secondary/15 dark:border-backgroundBody/15 bg-transparent text-secondary/80 dark:text-backgroundBody/80"
        >
          <option value="original">Keep format</option>
          <option value="webp">Convert to WebP</option>
          <option value="jpeg">Convert to JPEG</option>
        </select>

        <label className="flex items-center gap-2 text-sm text-secondary/70 dark:text-backgroundBody/70">
          <input type="checkbox" checked={resize} onChange={(e) => setResize(e.target.checked)} className="accent-[#12D8CC]" />
          Resize to
          <input
            type="number"
            value={maxDimension}
            min={100}
            max={8000}
            disabled={!resize}
            onChange={(e) => setMaxDimension(Number(e.target.value))}
            className="w-20 px-2 py-1 rounded border border-secondary/15 dark:border-backgroundBody/15 bg-transparent disabled:opacity-40"
          />
          px max
        </label>
      </div>

      {/* Dropzone */}
      <div
        onDragOver={(e) => {
          e.preventDefault();
          setDragOver(true);
        }}
        onDragLeave={() => setDragOver(false)}
        onDrop={onDrop}
        onClick={() => inputRef.current?.click()}
        className={`cursor-pointer rounded-2xl border-2 border-dashed p-10 text-center transition-colors ${
          dragOver ? 'border-primary bg-primary/5' : 'border-secondary/20 dark:border-backgroundBody/20'
        }`}
      >
        <input
          ref={inputRef}
          type="file"
          accept="image/jpeg,image/png,image/webp"
          multiple
          className="hidden"
          onChange={(e) => e.target.files && addFiles(e.target.files)}
        />
        <div className="w-14 h-14 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#12D8CC" strokeWidth="1.8">
            <path strokeLinecap="round" strokeLinejoin="round" d="M3 16.5V18a3 3 0 003 3h12a3 3 0 003-3v-1.5M7.5 9L12 4.5m0 0L16.5 9M12 4.5v12" />
          </svg>
        </div>
        <p className="text-lg font-medium text-secondary dark:text-backgroundBody">
          Drop images here or click to browse
        </p>
        <p className="text-sm text-secondary/50 dark:text-backgroundBody/50 mt-1">
          JPG, PNG or WebP · up to {MAX_FILES} files · 25 MB each
        </p>
      </div>

      <p className="text-center text-xs text-secondary/40 dark:text-backgroundBody/40 mt-3">
        🔒 Images never leave your device — compression happens entirely in your browser.
      </p>

      {/* Action bar */}
      {items.length > 0 && (
        <div className="flex flex-wrap items-center justify-between gap-3 mt-8">
          <div className="text-sm text-secondary/60 dark:text-backgroundBody/60">
            {items.length} image{items.length > 1 ? 's' : ''}
            {doneItems.length > 0 && (
              <>
                {' · '}
                <span className="text-primary font-medium">
                  {totalSaved > 0 ? `${totalSaved}% smaller` : 'already optimized'}
                </span>
                {' · '}
                {humanSize(totalOriginal)} → {humanSize(totalCompressed)}
              </>
            )}
          </div>
          <div className="flex gap-2">
            <button onClick={reset} className="px-4 py-2 rounded-full text-sm border border-secondary/15 dark:border-backgroundBody/15 hover:border-primary/50">
              Clear
            </button>
            {doneItems.length > 1 && (
              <button onClick={downloadZip} className="px-4 py-2 rounded-full text-sm border border-primary text-primary hover:bg-primary/10">
                Download all (.zip)
              </button>
            )}
            <button
              onClick={compressAll}
              disabled={working || items.every((i) => i.status === 'done')}
              className="px-5 py-2 rounded-full text-sm bg-primary text-black font-medium hover:opacity-90 disabled:opacity-50"
            >
              {working ? 'Compressing…' : doneItems.length ? 'Compress new' : 'Compress'}
            </button>
          </div>
        </div>
      )}

      {/* File list */}
      <div className="mt-6 space-y-3">
        {items.map((item) => {
          const saved =
            item.compressedSize != null
              ? Math.round((1 - item.compressedSize / item.originalSize) * 100)
              : null;
          return (
            <div
              key={item.id}
              className="flex items-center gap-4 p-3 rounded-xl border border-secondary/10 dark:border-backgroundBody/10 bg-secondary/[0.02] dark:bg-backgroundBody/[0.03]"
            >
              <img src={item.previewUrl} alt="" className="w-14 h-14 object-cover rounded-lg shrink-0" />
              <div className="flex-1 min-w-0">
                <p className="text-sm font-medium truncate text-secondary dark:text-backgroundBody">{item.file.name}</p>
                <p className="text-xs text-secondary/50 dark:text-backgroundBody/50">
                  {humanSize(item.originalSize)}
                  {item.status === 'done' && item.compressedSize != null && (
                    <>
                      {' → '}
                      <span className="text-primary font-medium">{humanSize(item.compressedSize)}</span>
                      {saved != null && (saved > 0 ? ` (−${saved}%)` : ' (already optimized)')}
                    </>
                  )}
                  {item.status === 'error' && <span className="text-red-500"> · failed</span>}
                </p>
              </div>
              {item.status === 'done' ? (
                <button onClick={() => downloadOne(item)} className="text-sm text-primary hover:underline shrink-0">
                  Download
                </button>
              ) : item.status === 'error' ? (
                <span className="text-xs text-red-500 shrink-0">Error</span>
              ) : (
                <span className="text-xs text-secondary/40 dark:text-backgroundBody/40 shrink-0">Ready</span>
              )}
              <button
                onClick={() => removeItem(item.id)}
                className="text-secondary/30 dark:text-backgroundBody/30 hover:text-red-500 shrink-0"
                aria-label="Remove"
              >
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          );
        })}
      </div>
    </div>
  );
}
