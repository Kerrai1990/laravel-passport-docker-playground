FROM php:7.2-fpm

RUN apt-get update \
    && apt-get install -y curl gnupg2 git build-essential \
    libmcrypt-dev mysql-client unzip zip \
    && docker-php-ext-install pdo_mysql \
    && curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -sL https://deb.nodesource.com/setup_8.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www
COPY . /var/www

RUN chmod +x artisan
RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache