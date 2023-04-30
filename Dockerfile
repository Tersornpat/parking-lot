FROM php:8.1.12-apache
COPY . /var/www/html/
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli