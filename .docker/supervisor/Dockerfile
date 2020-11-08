FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk --update add supervisor \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

RUN rm /var/cache/apk/* && \
    mkdir -p /var/www/html

COPY ./.docker/supervisor/supervisord.conf /etc/supervisord.conf

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]
