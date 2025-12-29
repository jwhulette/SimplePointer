FROM amazonlinux:2023

RUN dnf upgrade
RUN dnf install -y pip \
    && pip install supervisor

COPY .docker/local/supervisor/supervisord.service /lib/systemd/system/supervisord.service
COPY .docker/local/supervisor/supervisor.conf /etc
COPY .docker/local/supervisor/supervisor.ini /etc/supervisord.d/supervisor.ini

RUN mkdir -p /var/log/supervisor/
RUN mkdir -p /var/run/supervisor/

#RUN systemctl daemon-reload
#RUN systemctl enable supervisord
#RUN systemctl start supervisord

# Install php
RUN dnf install -y php8.3 \
    php8.3-opcache \
    php8.3-common \
    php8.3-zip \
    php8.3-intl \
    php8.3-mbstring \
    php8.3-sodium

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

#FROM ubuntu:22.04 as build
#
#
## Setup for for PHP 8.3
#RUN apt update && \
#    apt upgrade && \
#    apt install ca-certificates apt-transport-https software-properties-common lsb-release -y && \
#    add-apt-repository ppa:ondrej/php -y && \
#    apt update
#
#ENV DEBIAN_FRONTEND=noninteractive
#
#RUN apt-get install php8.3 -y
#
#RUN apt-get install -y php8.3-bcmath \
#     php8.3-curl \
#     php8.3-zip  \
#     php8.3-intl \
#     php8.3-mbstring \
#     php8.3-sqlite3
#
# # Update php.ini configs
# ENV PHP_INI_DIR=/etc/php/8.3/cli
#RUN sed -E -i -e 's/opcache.enable=0/opcache.enable=1/' $PHP_INI_DIR/php.ini \
#    && sed -E -i -e 's/opcache.enable_cli=0/opcache.enable_cli=1/' $PHP_INI_DIR/php.ini \
#    # && sed -E -i -e 's/opcache.memory_consumption=192/opcache.memory_consumption=192/' $PHP_INI_DIR/php.ini \
#    # Determine how many files does your project have? find . -type f -print | grep php | wc -l
#    # The actual value used will be the first number in the set of prime numbers
#    #   { 223, 463, 983, 1979, 3907, 7963, 16229, 32531, 65407, 130987 } that is greater than or equal to the configured value
#    && sed -E -i -e 's/opcache.max_accelerated_files=1000000/opcache.max_accelerated_files=65407/' $PHP_INI_DIR/php.ini \
#    # For Development / testing, keep 1
#    # For performance / production, keep 0
#    && sed -E -i -e 's/opcache.validate_timestamps=0/opcache.validate_timestamps=1/' $PHP_INI_DIR/php.ini
#
#COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
#
## Copy files into image
#COPY --chown=www-data:www-data ./ /var/www/html
