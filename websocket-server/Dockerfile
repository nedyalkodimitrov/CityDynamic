FROM php:8.2-apache

RUN apt-get update && apt-get install -y librdkafka-dev \
    && pecl install rdkafka redis mongo \
    && docker-php-ext-enable rdkafka redis mongo

RUN a2enmod rewrite

WORKDIR /var/www/html
#COPY . .

EXPOSE 8080