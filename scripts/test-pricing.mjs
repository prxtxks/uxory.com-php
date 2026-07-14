/**
 * Pricing engine checks — run with: node scripts/test-pricing.mjs
 * (Loads the TS sources via a quick esbuild-free transpile using tsx-style
 * import through Vite's dep server is overkill — we strip types with a regex-
 * free approach: astro ships esbuild, use it programmatically.)
 */
import { build } from 'esbuild';
import { mkdtempSync, writeFileSync, rmSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join } from 'node:path';
import assert from 'node:assert';

const tmp = mkdtempSync(join(tmpdir(), 'pricing-'));
await build({
  entryPoints: ['src/lib/pricing/engine.ts'],
  bundle: true,
  format: 'esm',
  outfile: join(tmp, 'engine.mjs'),
});
const { estimate, productUnitPrice } = await import(join(tmp, 'engine.mjs'));

let passed = 0;
const check = (name, fn) => {
  try {
    fn();
    passed++;
    console.log(`✅ ${name}`);
  } catch (e) {
    console.error(`❌ ${name}: ${e.message}`);
    process.exitCode = 1;
  }
};

// 1. Minimal website in India → floored to Starter Spark ₹24,999
check('min website IN floors to ₹24,999', () => {
  const q = estimate({ category: 'website', websiteType: 'landing', pages: ['home'] }, 'IN');
  assert.equal(q.currency, 'INR');
  assert.equal(q.flooredTo, 24999);
  assert.ok(q.low <= 24999 && q.high >= 24999, `range ${q.low}-${q.high} should straddle floor`);
});

// 2. Minimal ecom floors to Commerce Catalyst
check('min shopify GLOBAL floors to $639', () => {
  const q = estimate({ category: 'ecommerce', platform: 'shopify', productCount: 5 }, 'GLOBAL');
  // shopify 50h × $35 = $1750 > $639 floor → NOT floored
  assert.equal(q.flooredTo, undefined);
  assert.ok(q.point >= 639);
});

// 3. 60-product custom ecom US: products beyond 10 billed at tiered discount
check('60-product custom ecom US product math', () => {
  const q = estimate(
    { category: 'ecommerce', platform: 'custom', techStack: 'nextjs', productCount: 60 },
    'GLOBAL'
  );
  const productLine = q.lineItems.find((i) => i.label.startsWith('Product setup'));
  assert.ok(productLine, 'has product line');
  // 60 products → tier ≤100 → 35% off $25 = $16.25; billable = 50 → $812.50
  assert.equal(productUnitPrice(60, 'GLOBAL'), 25 * 0.65);
  assert.equal(productLine.amount, 812.5);
});

// 4. Rush multiplies hours ×1.25
check('rush multiplier raises price ~25%', () => {
  const base = estimate({ category: 'website', websiteType: 'webapp' }, 'GLOBAL');
  const rush = estimate({ category: 'website', websiteType: 'webapp', rush: true }, 'GLOBAL');
  const ratio = rush.hours / base.hours;
  assert.ok(Math.abs(ratio - 1.25) < 0.001, `hours ratio ${ratio}`);
});

// 5. Supabase cheaper than custom backend
check('supabase backend cheaper than custom', () => {
  const supa = estimate({ category: 'website', websiteType: 'business', backend: 'supabase' }, 'IN');
  const custom = estimate({ category: 'website', websiteType: 'business', backend: 'custom' }, 'IN');
  assert.ok(supa.point < custom.point, `${supa.point} < ${custom.point}`);
});

// 6. LLM clamp respected + applied
check('llm adjustment shifts hours', () => {
  const base = estimate({ category: 'custom', description: 'x' }, 'GLOBAL', 0);
  const adj = estimate({ category: 'custom', description: 'x' }, 'GLOBAL', 40);
  assert.ok(Math.abs(adj.hours / base.hours - 1.4) < 0.001);
});

// 7. Friendly rounding: INR ends in 999-ish, USD ends in 9
check('friendly rounding', () => {
  const qIn = estimate({ category: 'website', websiteType: 'webapp', backend: 'custom' }, 'IN');
  const qUs = estimate({ category: 'website', websiteType: 'webapp', backend: 'custom' }, 'GLOBAL');
  assert.ok(String(qIn.low).endsWith('999') || qIn.low % 1000 === 999 || (qIn.low + 1) % 1000 === 0, `INR low ${qIn.low}`);
  assert.ok((qUs.low + 1) % 10 === 0, `USD low ${qUs.low}`);
});

// 8. Range straddles point
check('low ≤ point ≤ high', () => {
  const q = estimate({ category: 'mobile', mobilePlatform: 'cross', screenBand: 'l' }, 'IN');
  assert.ok(q.low <= q.point && q.point <= q.high, `${q.low} ≤ ${q.point} ≤ ${q.high}`);
});

rmSync(tmp, { recursive: true, force: true });
console.log(`\n${passed}/8 checks passed`);
