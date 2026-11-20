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
echo "  # 1. Verify PHP >= 8.4.1, then navigate to your document root"
echo "  php -v"
echo "  cd ~/public_html"
echo ""
echo "  # 2. Back up live state, then extract OVER the existing tree (do NOT delete public_html first)"
echo "  cp .env ~/fourislands-live.env.backup"
echo "  cp .htaccess ~/fourislands-live.htaccess.backup"
echo "  cp -a storage/app ~/fourislands-live-storage-app.backup"
echo "  tar -xzf $RELEASE"
echo "  cp ~/fourislands-live.env.backup .env"
echo "  cp ~/fourislands-live.htaccess.backup .htaccess"
echo "  mkdir -p storage/framework/views storage/framework/sessions storage/framework/cache/data storage/logs bootstrap/cache"
echo "  chmod 600 .env"
echo "  # Legacy root-level assets (NewFront, panelAssets, images, image, css, js,"
echo "  # Fourislands-v9) are NOT in the archive - they are preserved by extracting over."
echo "  # Do NOT run key:generate: it would change APP_KEY and break live sessions/data."
echo ""
echo "  # 3. Rebuild caches from the EXISTING live .env"
echo "  php artisan optimize"
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
