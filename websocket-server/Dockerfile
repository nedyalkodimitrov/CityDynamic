FROM php:8.2-apache

RUN apt-get update && apt-get install -y librdkafka-dev \
    && pecl install rdkafka redis mongodb \
    && docker-php-ext-enable rdkafka redis mongodb

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .

RUN composer install

EXPOSE 8080