FROM php:8.0-apache

# Install required PHP extensions and packages
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite

# Copy Laravel files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install --no-dev --no-interaction --no-plugins --no-scripts

# Set up cron job
COPY cron /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron
RUN crontab /etc/cron.d/laravel-cron
RUN touch /var/log/cron.log

# Set environment variables
ENV DB_CONNECTION=mysql
ENV DB_HOST=containers-us-west-150.railway.app
ENV DB_PORT=7817
ENV DB_DATABASE=railway
ENV DB_USERNAME=root
ENV DB_PASSWORD=KfckI33MOw4GsaglSeq9

# Start Apache
CMD ["apache2-foreground"]
