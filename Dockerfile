FROM php:8.3-cli-alpine

RUN apk add --no-cache libzip-dev  zip \
  && docker-php-ext-install zip \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
