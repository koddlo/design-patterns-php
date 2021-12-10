FROM php:8.1-apache

RUN apt-get update \
  && apt-get install -y libzip-dev zip \
  && docker-php-ext-install zip \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo "ServerName design-patterns-php" >> /etc/apache2/apache2.conf

RUN service apache2 restart

WORKDIR /var/www/html
