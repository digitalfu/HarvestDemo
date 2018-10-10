FROM php:7.1-jessie

RUN apt-get update \
    && apt-get install -y git zip unzip

RUN pecl install timecop-beta \
    && echo "extension=timecop.so" >> /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

COPY . /app

WORKDIR /app

RUN composer install --no-interaction

EXPOSE 8000
ENTRYPOINT ./bin/console server:run 0.0.0.0:8000