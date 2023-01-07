FROM php:8.2-fpm-alpine

# install configure file
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

# settings
COPY settings/php.ini /usr/local/etc/php/conf.d/php.ini
COPY settings/www-original.conf /usr/local/etc/php-fpm.d/www.conf
