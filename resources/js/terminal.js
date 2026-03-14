import { marked } from 'marked';
import { runBoot, isBootEnabled } from './boot.js';

// ─── Tux ASCII art ────────────────────────────────────────────────────────────
const TUX = `<span class="t-white">        .--.
       |o_o |
       |:_/ |
      //   \\ \\
     (|     | )
    /'\\_   _/\`\\
    \\___)=(___/</span>`;

// ─── RISHAN.DEV ASCII art ─────────────────────────────────────────────────────
const RISHAN_ASCII = `<div class="terminal-ascii"><span class="t-green t-bold">  ██████╗ ██╗███████╗██╗  ██╗ █████╗ ███╗   ██╗   ██████╗ ███████╗██╗   ██╗
  ██╔══██╗██║██╔════╝██║  ██║██╔══██╗████╗  ██║   ██╔══██╗██╔════╝██║   ██║
  ██████╔╝██║███████╗███████║███████║██╔██╗ ██║   ██║  ██║█████╗  ██║   ██║
  ██╔══██╗██║╚════██║██╔══██║██╔══██║██║╚██╗██║   ██║  ██║██╔══╝  ╚██╗ ██╔╝
  ██║  ██║██║███████║██║  ██║██║  ██║██║ ╚████║██╗██████╔╝███████╗ ╚████╔╝
  ╚═╝  ╚═╝╚═╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝╚═╝╚═════╝ ╚══════╝  ╚═══╝</span></div>`;

// ─── marked config (no HTML sanitization -- our own content only) ─────────────
marked.setOptions({ breaks: true, gfm: true });

// ─── Terminal Alpine.js data component ───────────────────────────────────────
export default function terminal() {
  return {
    history: [],         // lines in output pane
    cmdHistory: [],      // commands typed (for arrow-key recall)
    cmdIndex: -1,
    input: '',
    cwd: '~',
    fs: null,            // virtual filesystem tree from API
    loading: true,

    get prompt() {
      return `<span class="t-green">visitor</span><span class="t-white">@</span><span class="t-cyan">rishan.dev</span><span class="t-white">:</span><span class="t-amber">${this.cwd}</span><span class="t-white">$</span>`;
    },

    async init() {
      // Load virtual filesystem
      try {
        const res = await fetch('/api/terminal/fs');
        this.fs = await res.json();
      } catch {
        this.push('<span class="t-red">Warning: filesystem unavailable</span>');
      }
      this.loading = false;

      // Boot sequence or plain welcome
      if (isBootEnabled()) {
        await runBoot((line) => this.push(line));
      } else {
        this.push(RISHAN_ASCII);
        this.push('');
        this.push(`<span class="t-muted">Welcome to rishan.dev — type <span class="t-amber">help</span> to get started.</span>`);
        this.push('');
      }

      this.$nextTick(() => this.focusInput());
    },

    focusInput() {
      this.$el.querySelector('.terminal-input')?.focus();
    },

    push(html) {
      this.history.push({ html });
      this.$nextTick(() => {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'instant' });
      });
    },

    execute() {
      const raw = this.input.trim();
      this.input = '';
      this.cmdIndex = -1;

      if (!raw) return;

      // Echo the command
      this.push(`${this.prompt} <span class="t-white">${this.escHtml(raw)}</span>`);

      // Save to history
      this.cmdHistory.unshift(raw);
      if (this.cmdHistory.length > 100) this.cmdHistory.pop();

      const [cmd, ...args] = raw.split(/\s+/);
      this.runCommand(cmd.toLowerCase(), args, raw);
    },

    historyUp() {
      if (this.cmdHistory.length === 0) return;
      this.cmdIndex = Math.min(this.cmdIndex + 1, this.cmdHistory.length - 1);
      this.input = this.cmdHistory[this.cmdIndex];
    },

    historyDown() {
      if (this.cmdIndex <= 0) {
        this.cmdIndex = -1;
        this.input = '';
        return;
      }
      this.cmdIndex--;
      this.input = this.cmdHistory[this.cmdIndex];
    },

    tabComplete() {
      if (!this.input.trim()) return;
      const parts = this.input.split(/\s+/);
      const partial = parts[parts.length - 1];
      const node = this.getNode(this.cwd === '~' ? '/' : this.cwd.replace('~/', '/'));
      if (!node) return;
      const matches = node.filter(n => n.name.startsWith(partial));
      if (matches.length === 1) {
        parts[parts.length - 1] = matches[0].name + (matches[0].type === 'dir' ? '/' : '');
        this.input = parts.join(' ');
      } else if (matches.length > 1) {
        this.push(matches.map(m => `<span class="t-cyan">${m.name}</span>`).join('  '));
      }
    },

    // ── Command dispatcher ───────────────────────────────────────────────────
    runCommand(cmd, args, raw) {
      switch (cmd) {
        case 'help':      return this.cmdHelp();
        case 'ls':        return this.cmdLs(args);
        case 'cd':        return this.cmdCd(args);
        case 'cat':       return this.cmdCat(args);
        case 'pwd':       return this.push(`<span class="t-white">/home/${this.cwd.replace('~', 'visitor')}</span>`);
        case 'clear':     return (this.history = []);
        case 'whoami':    return this.cmdWhoami();
        case 'fastfetch': return this.cmdFastfetch();
        case 'neofetch':  return this.cmdNeofetch();
        case 'matrix':    return this.cmdMatrix(args);
        case 'history':   return this.cmdHistory2();
        case 'boot':      return this.cmdBoot(args);
        case 'theme':     return this.cmdTheme(args);
        case 'echo':      return this.push(`<span class="t-white">${this.escHtml(args.join(' '))}</span>`);
        case 'curl':      return this.cmdCurl(args);
        default:
          this.push(`<span class="t-red">bash: ${this.escHtml(cmd)}: command not found</span>`);
          this.push(`<span class="t-muted">Type <span class="t-amber">help</span> for available commands.</span>`);
      }
    },

    // ── help ─────────────────────────────────────────────────────────────────
    cmdHelp() {
      this.push(`<span class="t-green t-bold">Available commands:</span>
<span class="t-white"></span>
  <span class="t-cyan">curl</span> <span class="t-muted">&lt;page&gt;</span>         Navigate to a page (e.g. curl /projects)
<span class="t-white"></span>
  <span class="t-cyan">ls</span> <span class="t-muted">[path]</span>          List directory contents
  <span class="t-cyan">ls -la</span> <span class="t-muted">[path]</span>       Detailed listing with permissions
  <span class="t-cyan">cd</span> <span class="t-muted">&lt;dir&gt;</span>           Change directory
  <span class="t-cyan">cat</span> <span class="t-muted">&lt;file&gt;</span>          Display file contents (renders markdown)
  <span class="t-cyan">pwd</span>               Print working directory
  <span class="t-cyan">clear</span>             Clear terminal screen
  <span class="t-cyan">whoami</span>            Display identity
  <span class="t-cyan">fastfetch</span>         System information (full)
  <span class="t-cyan">neofetch</span>          System information (classic)
  <span class="t-cyan">matrix</span>            Enter the Matrix (default 5s)
  <span class="t-cyan">matrix -t</span> <span class="t-muted">&lt;secs&gt;</span>   Run for specified seconds
  <span class="t-cyan">matrix --unlim</span>    Run until any key pressed
  <span class="t-cyan">history</span>           Show command history
  <span class="t-cyan">boot --enable</span>     Enable boot sequence on next visit
  <span class="t-cyan">boot --disable</span>    Disable boot sequence
  <span class="t-cyan">theme</span> <span class="t-muted">&lt;light|dark|toggle&gt;</span>   Switch colour theme
  <span class="t-cyan">echo</span> <span class="t-muted">&lt;text&gt;</span>         Print text`);
    },

    // ── ls ───────────────────────────────────────────────────────────────────
    cmdLs(args) {
      const detailed = args.includes('-la') || args.includes('-l');
      const pathArg = args.filter(a => !a.startsWith('-'))[0];
      const target = pathArg ? this.resolvePath(pathArg) : this.cwd;
      const node = this.getNode(target);

      if (!node) {
        return this.push(`<span class="t-red">ls: cannot access '${this.escHtml(pathArg || target)}': No such file or directory</span>`);
      }
      if (node.type === 'file') {
        return this.push(`<span class="t-white">${this.escHtml(node.name)}</span>`);
      }

      const children = Array.isArray(node) ? node : node.children || [];
      if (children.length === 0) {
        return this.push('<span class="t-muted">total 0</span>');
      }

      if (detailed) {
        this.push(`<span class="t-muted">total ${children.length}</span>`);
        children.forEach(n => {
          const isDir = n.type === 'dir';
          const perms = isDir ? 'drwxr-xr-x' : '-rw-r--r--';
          const name = isDir
            ? `<span class="t-cyan t-bold">${n.name}/</span>`
            : `<span class="t-white">${n.name}</span>`;
          this.push(`<span class="t-muted">${perms}  visitor  rishan.dev  </span>${name}`);
        });
      } else {
        const parts = children.map(n =>
          n.type === 'dir'
            ? `<span class="t-cyan t-bold">${n.name}/</span>`
            : `<span class="t-white">${n.name}</span>`
        );
        this.push(parts.join('  '));
      }
    },

    // ── cd ───────────────────────────────────────────────────────────────────
    cmdCd(args) {
      const target = args[0];
      if (!target || target === '~') {
        this.cwd = '~';
        return;
      }
      if (target === '..') {
        if (this.cwd === '~') return;
        const parts = this.cwd.split('/');
        parts.pop();
        this.cwd = parts.join('/') || '~';
        return;
      }

      const resolved = this.resolvePath(target);
      const node = this.getNode(resolved);

      if (!node) {
        return this.push(`<span class="t-red">bash: cd: ${this.escHtml(target)}: No such file or directory</span>`);
      }
      if (node.type === 'file') {
        return this.push(`<span class="t-red">bash: cd: ${this.escHtml(target)}: Not a directory</span>`);
      }

      this.cwd = resolved;

      // Navigate to the matching page route
      const routeMap = {
        '~/projects':  '/projects',
        '~/skills':    '/skills',
        '~/aboutme':   '/aboutme',
        '~/contactme': '/contactme',
        '~/blog':      '/blog',
      };
      if (routeMap[this.cwd]) {
        this.push(`<span class="t-muted">Navigating to ${routeMap[this.cwd]}...</span>`);
        setTimeout(() => { window.location.href = routeMap[this.cwd]; }, 400);
      }
    },

    // ── cat ──────────────────────────────────────────────────────────────────
    async cmdCat(args) {
      if (!args[0]) {
        return this.push('<span class="t-red">cat: missing operand</span>');
      }

      const filePath = this.resolvePath(args[0]).replace(/^~\//, '');
      try {
        const res = await fetch(`/api/terminal/file/${filePath}`);
        if (!res.ok) throw new Error('not found');
        const text = await res.text();
        // Strip any HTML before parsing markdown
        const safeText = text.replace(/<[^>]+>/g, '');
        const html = marked.parse(safeText);
        this.push(`<div class="terminal-md">${html}</div>`);
      } catch {
        this.push(`<span class="t-red">cat: ${this.escHtml(args[0])}: No such file or directory</span>`);
      }
    },

    // ── whoami ───────────────────────────────────────────────────────────────
    cmdWhoami() {
      this.push(RISHAN_ASCII);
      this.push('');
      this.push(`  <span class="t-white t-bold">Rishan Thirukumar</span>`);
      this.push(`  <span class="t-muted">Computer Science Graduate &amp; Software Developer</span>`);
      this.push(`  <span class="t-cyan">Email:</span>    <span class="t-white">rishan-tk@rishan.dev</span>`);
      this.push(`  <span class="t-cyan">GitHub:</span>   <span class="t-white">github.com/rishan-tk</span>`);
      this.push(`  <span class="t-cyan">LinkedIn:</span> <span class="t-white">linkedin.com/in/rishan-thirukumar</span>`);
      this.push('');
    },

    // ── fastfetch ─────────────────────────────────────────────────────────────
    async cmdFastfetch() {
      const ip = await this.fetchIp();
      const now = new Date();
      const uptime = this.calcUptime();
      this.push(
`${TUX}         <span class="t-green t-bold">visitor</span><span class="t-white">@</span><span class="t-cyan">rishan.dev</span>
         <span class="t-muted">-------------------</span>
         <span class="t-cyan">OS:</span>          <span class="t-white">rishan.dev GNU/Linux 2.0 (Portfolio)</span>
         <span class="t-cyan">Host:</span>        <span class="t-white">Cloudflare + Nginx + PHP-FPM</span>
         <span class="t-cyan">Kernel:</span>      <span class="t-white">Laravel 12.x</span>
         <span class="t-cyan">Uptime:</span>      <span class="t-white">${uptime}</span>
         <span class="t-cyan">Packages:</span>    <span class="t-white">12 (skills)</span>
         <span class="t-cyan">Shell:</span>       <span class="t-white">rishan.dev/terminal v2.0</span>
         <span class="t-cyan">Resolution:</span>  <span class="t-white">${window.screen.width}x${window.screen.height}</span>
         <span class="t-cyan">Terminal:</span>    <span class="t-white">browser (Alpine.js + marked)</span>
         <span class="t-cyan">CPU:</span>         <span class="t-white">${navigator.hardwareConcurrency || '?'}-core logical processor</span>
         <span class="t-cyan">Memory:</span>      <span class="t-white">${navigator.deviceMemory ? navigator.deviceMemory + ' GB (approx)' : 'unknown'}</span>
         <span class="t-cyan">Local IP:</span>    <span class="t-white">${ip}</span>
         <span class="t-cyan">Locale:</span>      <span class="t-white">${navigator.language}</span>
         <span class="t-cyan">Time:</span>        <span class="t-white">${now.toLocaleTimeString()}</span>
         <span class="t-cyan">Theme:</span>       <span class="t-white">${document.documentElement.dataset.theme || 'dark'}</span>`
      );
    },

    // ── neofetch ──────────────────────────────────────────────────────────────
    async cmdNeofetch() {
      const uptime = this.calcUptime();
      this.push(
`${TUX}         <span class="t-green t-bold">visitor</span><span class="t-white">@</span><span class="t-cyan">rishan.dev</span>
         <span class="t-muted">-------------------</span>
         <span class="t-cyan">OS:</span>     <span class="t-white">rishan.dev GNU/Linux</span>
         <span class="t-cyan">Kernel:</span> <span class="t-white">Laravel 12.x</span>
         <span class="t-cyan">Uptime:</span> <span class="t-white">${uptime}</span>
         <span class="t-cyan">Shell:</span>  <span class="t-white">rishan.dev/terminal</span>
         <span class="t-cyan">CPU:</span>    <span class="t-white">${navigator.hardwareConcurrency || '?'}-core</span>
         <span class="t-cyan">Memory:</span> <span class="t-white">${navigator.deviceMemory ? navigator.deviceMemory + ' GB' : 'unknown'}</span>`
      );
    },

    // ── curl ─────────────────────────────────────────────────────────────────
    cmdCurl(args) {
      if (!args[0]) {
        return this.push('<span class="t-muted">Usage: curl &lt;page&gt;  e.g. curl /projects</span>');
      }

      const routeMap = {
        'projects':  '/projects',
        'skills':    '/skills',
        'aboutme':   '/aboutme',
        'contactme': '/contactme',
        'blog':      '/blog',
        '/projects':  '/projects',
        '/skills':    '/skills',
        '/aboutme':   '/aboutme',
        '/contactme': '/contactme',
        '/blog':      '/blog',
      };

      // Also strip leading rishan.dev/ or rishan.dev
      const raw = args[0].replace(/^(https?:\/\/)?(www\.)?rishan\.dev/, '').replace(/\/$/, '') || '/';
      const key = raw === '' ? '/' : raw;
      const dest = routeMap[key] ?? routeMap[key.replace(/^\//, '')];

      if (!dest) {
        return this.push(`<span class="t-red">curl: (6) Could not resolve host: ${this.escHtml(args[0])}</span>`);
      }

      this.push(`<span class="t-muted">  % Total    % Received  Time</span>`);
      this.push(`<span class="t-muted">  0     0    0     0     0:00:00</span>`);
      this.push(`<span class="t-green">Navigating to ${dest}...</span>`);
      setTimeout(() => { window.location.href = dest; }, 500);
    },

    // ── matrix ───────────────────────────────────────────────────────────────
    cmdMatrix(args) {
      const unlimited = args.includes('--unlim');
      let duration = 5000;

      const tIdx = args.indexOf('-t');
      if (tIdx !== -1) {
        const val = parseInt(args[tIdx + 1], 10);
        if (!val || val <= 0 || !Number.isInteger(val)) {
          return this.push('<span class="t-red">matrix: -t requires a positive integer (seconds). E.g. matrix -t 10</span>');
        }
        duration = val * 1000;
      }

      if (unlimited) {
        this.push('<span class="t-green">Initializing matrix protocol... <span class="t-muted">(press any key to exit)</span></span>');
      } else {
        const secs = duration / 1000;
        this.push(`<span class="t-green">Initializing matrix protocol... <span class="t-muted">(${secs}s)</span></span>`);
      }

      const canvas = document.createElement('canvas');
      canvas.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;z-index:9999;background:#000;opacity:0;transition:opacity 0.3s';
      document.body.appendChild(canvas);
      requestAnimationFrame(() => { canvas.style.opacity = '1'; });

      const ctx = canvas.getContext('2d');
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      const cols = Math.floor(canvas.width / 16);
      const drops = Array(cols).fill(1);
      const chars = 'アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン0123456789ABCDEF';

      const interval = setInterval(() => {
        ctx.fillStyle = 'rgba(0,0,0,0.05)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = '#4ade80';
        ctx.font = '14px monospace';
        drops.forEach((y, i) => {
          const char = chars[Math.floor(Math.random() * chars.length)];
          ctx.fillText(char, i * 16, y * 16);
          if (y * 16 > canvas.height && Math.random() > 0.975) drops[i] = 0;
          drops[i]++;
        });
      }, 50);

      const stop = () => {
        clearInterval(interval);
        document.removeEventListener('keydown', onKey);
        canvas.style.opacity = '0';
        setTimeout(() => {
          canvas.remove();
          this.push('<span class="t-green">Matrix protocol terminated. Welcome back.</span>');
          this.focusInput();
        }, 300);
      };

      const onKey = () => stop();

      if (unlimited) {
        document.addEventListener('keydown', onKey, { once: true });
      } else {
        setTimeout(stop, duration);
      }
    },

    // ── history ───────────────────────────────────────────────────────────────
    cmdHistory2() {
      if (this.cmdHistory.length === 0) {
        return this.push('<span class="t-muted">No commands in history.</span>');
      }
      const last20 = [...this.cmdHistory].reverse().slice(0, 20);
      last20.forEach((cmd, i) => {
        this.push(`<span class="t-muted">${String(i + 1).padStart(4)}  </span><span class="t-white">${this.escHtml(cmd)}</span>`);
      });
    },

    // ── boot ──────────────────────────────────────────────────────────────────
    cmdBoot(args) {
      if (args[0] === '--enable') {
        localStorage.setItem('boot_enabled', '1');
        this.push('<span class="t-green">Boot sequence enabled. Will run on next visit.</span>');
      } else if (args[0] === '--disable') {
        localStorage.removeItem('boot_enabled');
        this.push('<span class="t-muted">Boot sequence disabled.</span>');
      } else {
        this.push('<span class="t-muted">Usage: boot --enable | boot --disable</span>');
      }
    },

    // ── theme ─────────────────────────────────────────────────────────────────
    cmdTheme(args) {
      const current = document.documentElement.dataset.theme || 'dark';
      let next;
      if (args[0] === 'light') next = 'light';
      else if (args[0] === 'dark') next = 'dark';
      else if (args[0] === 'toggle' || !args[0]) next = current === 'dark' ? 'light' : 'dark';
      else {
        return this.push('<span class="t-muted">Usage: theme &lt;light|dark|toggle&gt;</span>');
      }
      document.documentElement.dataset.theme = next;
      localStorage.setItem('theme', next);
      window.dispatchEvent(new CustomEvent('toggle-theme-sync', { detail: next }));
      this.push(`<span class="t-green">Theme set to <span class="t-amber">${next}</span>.</span>`);
    },

    // ── Helpers ───────────────────────────────────────────────────────────────
    escHtml(str) {
      return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    },

    resolvePath(target) {
      if (target.startsWith('~/') || target === '~') return target;
      if (target.startsWith('/')) return '~' + target;
      if (this.cwd === '~') return `~/${target}`;
      return `${this.cwd}/${target}`;
    },

    getNode(path) {
      if (!this.fs) return null;
      const clean = path.replace(/^~\/?/, '').replace(/^\//, '');
      if (!clean) return this.fs;

      const parts = clean.split('/').filter(Boolean);
      let node = this.fs;
      for (const part of parts) {
        const found = Array.isArray(node)
          ? node.find(n => n.name === part)
          : node.children?.find(n => n.name === part);
        if (!found) return null;
        node = found.type === 'dir' ? found.children : found;
      }
      return node;
    },

    async fetchIp() {
      try {
        const r = await fetch('https://api.ipify.org?format=json');
        const d = await r.json();
        return d.ip || 'unknown';
      } catch {
        return 'unavailable';
      }
    },

    calcUptime() {
      const launch = new Date('2025-12-01');
      const now = new Date();
      const days = Math.floor((now - launch) / 86400000);
      return `${days} days`;
    },
  };
}
