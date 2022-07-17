FROM php:8.1-cli-alpine

WORKDIR /var/www/html

RUN apk --update add supervisor \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

RUN rm /var/cache/apk/* && \
    mkdir -p /var/www/html

COPY ./.docker/supervisor/supervisord.conf /etc/supervisord.conf

# Use the development configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Update Opcache Configs
RUN sed -E -i -e 's/opcache.enable=0/opcache.enable=1/' /usr/local/etc/php/conf.d/opcache.ini \
    && sed -E -i -e 's/opcache.enable_cli=0/opcache.enable_cli=1/' /usr/local/etc/php/conf.d/opcache.ini \
    && sed -E -i -e 's/opcache.memory_consumption=192/opcache.memory_consumption=192/' /usr/local/etc/php/conf.d/opcache.ini \
    # Determine how many files does your project have? find . -type f -print | grep php | wc -l
    # The actual value used will be the first number in the set of prime numbers
    #   { 223, 463, 983, 1979, 3907, 7963, 16229, 32531, 65407, 130987 } that is greater than or equal to the configured value
    && sed -E -i -e 's/opcache.max_accelerated_files=1000000/opcache.max_accelerated_files=16229/' /usr/local/etc/php/conf.d/opcache.ini \
    # For Development / testing, keep 1
    # For performance / production, keep 0
    && sed -E -i -e 's/opcache.validate_timestamps=0/opcache.validate_timestamps=1/' /usr/local/etc/php/conf.d/opcache.ini

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]
