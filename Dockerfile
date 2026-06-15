FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    git \
    && docker-php-ext-install intl pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --optimize-autoloader

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/webroot

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}/!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80