# rishan.dev

Personal portfolio site built with Laravel 12, Blade, Tailwind CSS 4, Alpine.js, and SQLite.

## Local Development

Requires [Laravel Herd](https://herd.laravel.com/) or PHP 8.3+, Composer, and Node.js 20+.

```bash
composer install
npm install
cp .env.template .env   # then edit .env with local values
php artisan key:generate
php artisan migrate
npm run dev
```

## Deployment

Automatic via GitHub Actions on push to `rehaul`. Uses [Deployer](https://deployer.org/) for zero-downtime deploys.

GitHub secrets required:
- `DEPLOY_KEY` — SSH private key for the deploy user
- `SERVER_HOST` — VPS hostname
- `SERVER_PORT` — SSH port

## Tech Stack

- **Backend:** Laravel 12, PHP 8.3, SQLite
- **Frontend:** Alpine.js, Tailwind CSS v4, Vite
- **Server:** Nginx, PHP-FPM, Ubuntu 24
- **CDN / Security:** Cloudflare (Full Strict SSL, Authenticated Origin Pulls)
- **CI/CD:** GitHub Actions + Deployer
