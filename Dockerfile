FROM php:8.2-fpm

WORKDIR /var/www/html

COPY public/ /var/www/html/public/
COPY config/ /var/www/html/config/

EXPOSE 9000

CMD ["php-fpm"]