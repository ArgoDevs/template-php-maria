FROM php:8.2-apache

RUN a2enmod ssl && a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
