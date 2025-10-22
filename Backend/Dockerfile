# Use PHP 8.4 with Apache
FROM php:8.4-apache

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite (important for Laravel routes)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . /var/www/html

# Install Composer (using official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies and optimize autoloader
RUN composer install --no-dev --optimize-autoloader

# Set correct file permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 (Apache default)
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
