FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
     libxslt-dev libzip-dev libcurl4-gnutls-dev \
    && docker-php-ext-install xsl pdo_mysql mbstring intl zip curl
RUN apt-get install -y git
RUN apt-get install -y unzip

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer