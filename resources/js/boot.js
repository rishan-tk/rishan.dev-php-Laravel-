import { BOOT_LINES } from './data/boot-lines.js';
import { RISHAN_LINES } from './data/ascii-logo.js';

function delay(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

export function isBootEnabled() {
  // Default ON — only disabled when explicitly set to '0'
  return localStorage.getItem('boot_enabled') !== '0';
}

export async function runBoot(pushFn) {
  // Phase 1: boot status lines
  for (const line of BOOT_LINES) {
    await delay(200 + Math.random() * 200);
    pushFn(line);
  }
  await delay(500);

  // Phase 2: ASCII logo reveal, line by line
  pushFn('');
  for (const row of RISHAN_LINES) {
    await delay(80);
    pushFn(`<div class="terminal-ascii boot-fade-in"><span class="t-green t-bold">${row}</span></div>`);
  }
  await delay(300);

  // Phase 3: welcome text typed out character by character
  // Text is split into segments: plain muted text and the amber "help" word.
  // Each segment gets its own span so innerHTML is never clobbered by textContent writes.
  pushFn('');
  const segments = [
    { text: 'Welcome to rishan.dev \u2014 type ', cls: 't-muted' },
    { text: 'help', cls: 't-amber' },
    { text: ' to get started.', cls: 't-muted' },
  ];

  const wrapperId = `boot-welcome-${Date.now()}`;
  // Pre-build empty spans for each segment so we can fill them by index
  const innerHtml = segments
    .map((s, i) => `<span class="${s.cls}" id="${wrapperId}-${i}"></span>`)
    .join('');
  pushFn(`<span id="${wrapperId}">${innerHtml}</span>`);

  await delay(200);
  for (let s = 0; s < segments.length; s++) {
    const el = document.getElementById(`${wrapperId}-${s}`);
    if (!el) continue;
    for (const char of segments[s].text) {
      el.textContent += char;
      await delay(25 + Math.random() * 20);
    }
  }
  pushFn('');
}
