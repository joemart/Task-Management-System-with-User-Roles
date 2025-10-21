# Use official PHP-Apache image
FROM php:8.2-apache

# Install PostgreSQL extension for PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Enable Apache rewrite module (for clean URLs)
RUN a2enmod rewrite

COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Copy PHP files to container
COPY src/ /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html