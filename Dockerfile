FROM composer:2 AS build-vendor
WORKDIR /build
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts

FROM php:8.4-fpm-alpine

RUN apk add --no-cache --virtual .build-deps \
    freetype-dev \
    gettext-dev \
    icu-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    $PHPIZE_DEPS \
    && apk add --no-cache \
    curl \
    freetype \
    gettext-libs \
    icu-libs \
    libjpeg-turbo \
    libpng \
    libzip \
    zlib \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        exif \
        gd \
        gettext \
        intl \
        mysqli \
        pdo_mysql \
        zip \
    && apk del --no-cache .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && sed -i 's/upload_max_filesize = .*/upload_max_filesize = 100M/' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/post_max_size = .*/post_max_size = 100M/' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/memory_limit = .*/memory_limit = 256M/' "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html

COPY --from=build-vendor /build/vendor/ vendor/

COPY --chown=www-data:www-data . .

RUN mkdir -p storage/logs storage/framework/cache/data storage/framework/sessions storage/framework/views bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

RUN rm -f bootstrap/cache/packages.php bootstrap/cache/services.php

RUN su -s /bin/sh www-data -c "php artisan package:discover --ansi 2>/dev/null || true"

RUN su -s /bin/sh www-data -c "composer run-script post-autoload-dump 2>/dev/null || true"

RUN su -s /bin/sh www-data -c "php artisan storage:link --force 2>/dev/null || true"

USER www-data

EXPOSE 9000

CMD ["php-fpm"]
