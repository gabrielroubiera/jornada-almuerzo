FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets

ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

WORKDIR /app

COPY composer.json composer.json
COPY . .

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
RUN composer dump-autoload
RUN php artisan key:generate
RUN chmod 0777 -R storage
RUN chmod 0777 -R vendor
RUN php artisan cache:clear
RUN php artisan config:cache
