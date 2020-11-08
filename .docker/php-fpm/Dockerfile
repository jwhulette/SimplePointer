FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk --update add curl \
    supervisor \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    zlib-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

RUN rm /var/cache/apk/* && \
    mkdir -p /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
