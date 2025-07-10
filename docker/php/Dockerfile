FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    sqlite3 libsqlite3-dev \
    zip unzip curl git \
    && docker-php-ext-install pdo pdo_sqlite

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
