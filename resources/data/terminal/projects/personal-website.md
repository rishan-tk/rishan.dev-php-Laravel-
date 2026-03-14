# Personal Website

**Stack:** Laravel 12, Alpine.js, Tailwind CSS v4, Vite, PHP 8.3

This very portfolio you're browsing — built from scratch as a terminal-themed interactive experience.

## Features

- Interactive Linux terminal on the homepage with real commands
- Virtual filesystem backed by `resources/data/terminal/`
- Dark theme (default) + Solarized Light theme, persisted in localStorage
- Fully fluid responsive design using `clamp()` — no breakpoint jumps
- Server hardened with Cloudflare Authenticated Origin Pulls, custom SSH port, UFW firewall rules
- Zero npm vulnerabilities, pinned dependency versions

## Deployment

Automated via GitHub Actions + Deployer. Pushes to `rehaul` branch trigger a zero-downtime deploy to the VPS through Cloudflare.

## Links

- **Live:** [rishan.dev](https://rishan.dev)
- **GitHub:** [github.com/rishan-tk/rishan.dev](https://github.com/rishan-tk/rishan.dev)
