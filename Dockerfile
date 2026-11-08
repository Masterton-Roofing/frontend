FROM php:8.5-apache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Enable Apache modules and move the container listener to 8081.
RUN a2enmod rewrite headers \
    && sed -i 's/Listen 80/Listen 8081/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8081>/' /etc/apache2/sites-available/000-default.conf \
    && printf '<Directory /var/www/html>\n    Options -Indexes +FollowSymLinks\n    AllowOverride All\n    Require all granted\n</Directory>\n' \
       > /etc/apache2/conf-available/application.conf \
    && a2enconf application

WORKDIR /var/www/html

# Install locked production dependencies.
ENV COMPOSER_ALLOW_SUPERUSER=1

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

# Copy the application.
COPY . .

EXPOSE 8081
