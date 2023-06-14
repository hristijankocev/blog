FROM php:8.0.2-fpm-alpine as php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
    	&& apk --no-cache add postgresql-dev nodejs npm\
    	&& docker-php-ext-install pdo pdo_pgsql opcache

WORKDIR /var/www/html

ENTRYPOINT [ ".docker/entrypoint.sh" ]
