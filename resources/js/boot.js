const BOOT_LINES = [
  '[<span class="t-green">  OK  </span>] Loading kernel modules...',
  '[<span class="t-green">  OK  </span>] Starting networking...',
  '[<span class="t-green">  OK  </span>] Mounting /dev/portfolio...',
  '[<span class="t-green">  OK  </span>] Starting nginx...',
  '[<span class="t-green">  OK  </span>] Initializing rishan.dev v2.0...',
];

const RISHAN_ASCII = `<span class="t-green t-bold">  ██████╗ ██╗███████╗██╗  ██╗ █████╗ ███╗   ██╗   ██████╗ ███████╗██╗   ██╗
  ██╔══██╗██║██╔════╝██║  ██║██╔══██╗████╗  ██║   ██╔══██╗██╔════╝██║   ██║
  ██████╔╝██║███████╗███████║███████║██╔██╗ ██║   ██║  ██║█████╗  ██║   ██║
  ██╔══██╗██║╚════██║██╔══██║██╔══██║██║╚██╗██║   ██║  ██║██╔══╝  ╚██╗ ██╔╝
  ██║  ██║██║███████║██║  ██║██║  ██║██║ ╚████║██╗██████╔╝███████╗ ╚████╔╝
  ╚═╝  ╚═╝╚═╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝╚═╝╚═════╝ ╚══════╝  ╚═══╝</span>`;

function delay(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

export function isBootEnabled() {
  return localStorage.getItem('boot_enabled') === '1';
}

export async function runBoot(pushFn) {
  for (const line of BOOT_LINES) {
    await delay(200 + Math.random() * 200);
    pushFn(line);
  }
  await delay(400);
  pushFn('');
  pushFn(RISHAN_ASCII);
  pushFn('');
  pushFn(`<span class="t-muted">Welcome to rishan.dev — type <span class="t-amber">help</span> to get started.</span>`);
  pushFn('');
}
