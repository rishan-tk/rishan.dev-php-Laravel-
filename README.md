# rishan.dev

Personal portfolio site built with Laravel 12, Blade, Tailwind CSS 4, and SQLite.

## Local Development

Requires [Laravel Herd](https://herd.laravel.com/) (free) or PHP 8.2+, Composer, Node.js.

```bash
composer install
npm install
cp .env.template .env   # then edit .env with local values
php artisan key:generate
php artisan migrate
composer dev             # starts server, queue worker, and Vite
```

Site runs at `http://rishan.dev.test` (Herd) or `http://localhost:8000`.

## Production Server Setup (Ubuntu 24)

Run these on the VPS as root or with sudo.

### 1. System packages

```bash
apt-get update && apt-get upgrade -y
apt-get install -y software-properties-common curl git unzip acl
```

### 2. PHP 8.3

```bash
add-apt-repository -y ppa:ondrej/php
apt-get update
apt-get install -y php8.3-fpm php8.3-cli php8.3-mbstring php8.3-xml php8.3-curl php8.3-sqlite3 php8.3-zip
```

### 3. Nginx

```bash
apt-get install -y nginx
```

### 4. Node.js 20 LTS

```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
apt-get install -y nodejs
```

### 5. Composer

```bash
php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');"
php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm /tmp/composer-setup.php
```

### 6. Certbot (SSL)

```bash
apt-get install -y certbot python3-certbot-nginx
```

### 7. Create deploy user

```bash
adduser deploy
usermod -aG www-data deploy
```

Add your SSH public key(s) to `/home/deploy/.ssh/authorized_keys`.

### 8. Deployer directory structure

```bash
mkdir -p /var/www/laravel/shared/database
mkdir -p /var/www/laravel/shared/storage/app/public
mkdir -p /var/www/laravel/shared/storage/framework/{cache/data,sessions,views}
mkdir -p /var/www/laravel/shared/storage/logs
touch /var/www/laravel/shared/database/database.sqlite
chown -R deploy:www-data /var/www/laravel
chmod -R 775 /var/www/laravel/shared/storage
chmod -R 775 /var/www/laravel/shared/database
setfacl -Rdm g:www-data:rwx /var/www/laravel/shared/storage
setfacl -Rdm g:www-data:rwx /var/www/laravel/shared/database
```

### 9. Production .env

Copy `.env.template` to the server and fill in real values:

```bash
scp .env.template deploy@YOUR_VPS_IP:/var/www/laravel/shared/.env
ssh deploy@YOUR_VPS_IP "nano /var/www/laravel/shared/.env"
```

Set permissions:

```bash
chmod 640 /var/www/laravel/shared/.env
chown deploy:www-data /var/www/laravel/shared/.env
```

### 10. Nginx config

```bash
rm -f /etc/nginx/sites-enabled/default
nano /etc/nginx/sites-available/laravel
```

Paste:

```nginx
server {
    listen 80;
    server_name rishan.dev;

    root /var/www/laravel/current/public;
    index index.php;

    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
    }

    location ~ /\.(?!well-known) {
        deny all;
    }
}
```

Enable and restart:

```bash
ln -sf /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/laravel
nginx -t
systemctl restart nginx
systemctl restart php8.3-fpm
```

### 11. SSL (after DNS points to server)

```bash
certbot --nginx --agree-tos --redirect -m rishan-tk@rishan.dev -d rishan.dev --non-interactive
```

### 12. First deploy

Push to `main` to trigger GitHub Actions, or run locally:

```bash
dep deploy
```

## Deployment

Automatic via GitHub Actions on push to `main`. Uses [Deployer](https://deployer.org/) to SSH into the server and run a zero-downtime deploy.

GitHub secret required: `DEPLOY_KEY` (SSH private key for the `deploy` user).
