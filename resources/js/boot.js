const BOOT_LINES = [
  '[<span class="t-green">  OK  </span>] Loading kernel modules...',
  '[<span class="t-green">  OK  </span>] Starting networking...',
  '[<span class="t-green">  OK  </span>] Mounting /dev/portfolio...',
  '[<span class="t-green">  OK  </span>] Starting nginx...',
  '[<span class="t-green">  OK  </span>] Initializing rishan.dev v2.0...',
];

const RISHAN_LINES = [
  '  ██████╗ ██╗███████╗██╗  ██╗ █████╗ ███╗   ██╗   ██████╗ ███████╗██╗   ██╗',
  '  ██╔══██╗██║██╔════╝██║  ██║██╔══██╗████╗  ██║   ██╔══██╗██╔════╝██║   ██║',
  '  ██████╔╝██║███████╗███████║███████║██╔██╗ ██║   ██║  ██║█████╗  ██║   ██║',
  '  ██╔══██╗██║╚════██║██╔══██║██╔══██║██║╚██╗██║   ██║  ██║██╔══╝  ╚██╗ ██╔╝',
  '  ██║  ██║██║███████║██║  ██║██║  ██║██║ ╚████║██╗██████╔╝███████╗ ╚████╔╝',
  '  ╚═╝  ╚═╝╚═╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝╚═╝╚═════╝ ╚══════╝  ╚═══╝',
];

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
  pushFn('');
  const welcomeText = 'Welcome to rishan.dev \u2014 type help to get started.';
  const welcomeId = `boot-welcome-${Date.now()}`;
  pushFn(`<span class="t-muted" id="${welcomeId}"></span>`);

  await delay(200);
  const el = document.getElementById(welcomeId);
  if (el) {
    for (let i = 0; i < welcomeText.length; i++) {
      const char = welcomeText[i];
      if (char === 'h' && welcomeText.substring(i, i + 4) === 'help') {
        el.innerHTML += '<span class="t-amber">help</span>';
        i += 3;
      } else {
        el.textContent += char;
      }
      await delay(25 + Math.random() * 20);
    }
  } else {
    pushFn(`<span class="t-muted">Welcome to rishan.dev — type <span class="t-amber">help</span> to get started.</span>`);
  }
  pushFn('');
}
