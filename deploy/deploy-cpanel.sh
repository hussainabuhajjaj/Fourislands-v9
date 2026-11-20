#!/bin/bash
set -euo pipefail

RELEASE="fourislands-$(date +%Y%m%d-%H%M).tar.gz"
EXCLUDE="--exclude=node_modules --exclude=.git --exclude=.env --exclude=./deploy --exclude=./docker --exclude=./Dockerfile --exclude=./Dockerfile.dev --exclude=./docker-compose*.yml --exclude=./Makefile --exclude=./tests --exclude=./phpunit.xml --exclude=./.phpunit.result.cache --exclude=./package.json --exclude=./package-lock.json --exclude=./webpack.mix.js --exclude=./vite.config.js --exclude=./postcss.config.js --exclude=./tailwind.config.js --exclude=./.editorconfig --exclude=./.styleci.yml --exclude=./.gitattributes --exclude=./.env.docker.example --exclude=storage/logs/* --exclude=storage/framework/cache/data/* --exclude=storage/framework/sessions/* --exclude=storage/framework/views/* --exclude=bootstrap/cache/config.php --exclude=.DS_Store --exclude=*.tar.gz"

echo "==> 1. Installing PHP dependencies (no dev)..."
composer install --no-dev --no-interaction --optimize-autoloader

echo "==> 2. Frontend assets are committed in public/ (NewFront, panelAssets, css/app.css, js/app.js) - no build step needed."

echo "==> 3. Optimizing Laravel (config cache is created on the server after .env is configured)..."
php artisan optimize:clear
php artisan view:cache
php artisan route:cache
php artisan event:cache

echo "==> 4. Generating release archive..."
tar -czf "$RELEASE" \
    $EXCLUDE \
    .

echo "==> 5. Done! Upload $RELEASE to your cPanel server via FTP/SFTP."
echo ""
echo "=== cPanel Installation Steps ==="
echo ""
echo "SSH into your cPanel server, then:"
echo ""
echo "  # 1. Navigate to your document root (e.g., public_html)"
echo "  cd ~/public_html"
echo ""
echo "  # 2. Extract the archive"
echo "  tar -xzf $RELEASE"
echo "  mkdir -p storage/framework/views storage/framework/sessions storage/framework/cache/data storage/logs bootstrap/cache"
echo ""
echo "  # 3. Set up .env"
echo "  cp .env.example .env"
echo "  nano .env    # Set DB, APP_URL, APP_KEY, etc."
echo "  php artisan key:generate"
echo "  php artisan optimize    # builds config/route/view/event caches from the server .env"
echo ""
echo "  # 4. Fix permissions"
echo "  chmod -R 775 storage bootstrap/cache"
echo "  chown -R <your-cpanel-user>:<group> ."
echo ""
echo "  # 5. Run migrations"
echo "  php artisan migrate --force"
echo ""
echo "=== IMPORTANT: cPanel Document Root ==="
echo "Set the domain/subdomain document root to the PROJECT ROOT (not public/)."
echo "The .htaccess at the project root rewrites all requests into public/."
echo "If your cPanel only allows public_html as doc root, upload there directly."
