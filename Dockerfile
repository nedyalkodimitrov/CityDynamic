# Use the official PHP image with Apache
FROM php:8.2-apache

# Install required dependencies for Kafka and Redis
RUN apt-get update && apt-get install -y \
    librdkafka-dev \
    redis-server \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions: Kafka and Redis
RUN pecl install rdkafka && docker-php-ext-enable rdkafka
RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy your PHP application code into the container
COPY ./web-server/ .

# Expose port 80 for Apache
EXPOSE 8000
RUN composer install
