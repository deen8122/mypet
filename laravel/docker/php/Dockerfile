FROM php:8.3-fpm

ARG NODE_VERSION=22

RUN apt-get update && apt-get install -y \
        curl git zip unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	libmcrypt-dev && docker-php-ext-install bcmath

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

RUN pecl install xhprof

RUN docker-php-ext-enable \
    xhprof \
    opcache

EXPOSE 8000

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ADD docker/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
# Copy existing application directory permissions
COPY --chown=www:www . /var/www
# Change current user to www
USER www
#RUN npm install
WORKDIR /app
CMD ["php-fpm"]