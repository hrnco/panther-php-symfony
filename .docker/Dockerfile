FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip chromium-driver unzip \
    && docker-php-ext-install pdo_mysql mbstring exif zip pcntl bcmath gd gettext opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

ENV PANTHER_NO_SANDBOX 1
ENV PANTHER_CHROME_ARGUMENTS='--disable-dev-shm-usage --disable-gpu --disable-extensions --remote-debugging-port=9222'

ADD ./ /var/www/html

RUN composer install
