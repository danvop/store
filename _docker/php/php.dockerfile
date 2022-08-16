FROM php:fpm-alpine3.15
# FROM php:8-fpm-alpine

ENV PHPGROUP=danvop
ENV PHPUSER=danvop

RUN adduser -g ${PHPGROUP} -s /bin/sh -D ${PHPUSER}

RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html/public

RUN docker-php-ext-install pdo pdo_mysql bcmath
# RUN docker-php-ext-install bcmath

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
