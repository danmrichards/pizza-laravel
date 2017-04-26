FROM php:7-fpm-alpine

ARG MICROSERVICE_SERVICE_ID=servicename
ENV MICROSERVICE_SERVICE_ID $MICROSERVICE_SERVICE_ID
ENV PHPREDIS_VERSION 3.0.0

RUN docker-php-source extract \
    && apk add --no-cache libxml2-dev curl $PHPIZE_DEPS \
    && mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-install ctype iconv json mbstring opcache xml redis pdo_mysql \
    && docker-php-source delete

ADD docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
ADD service /service
RUN chown -R www-data. /service
WORKDIR /service