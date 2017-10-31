FROM php:7.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    mc \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng12-dev \
    zlib1g-dev \
    libicu-dev \
    jpegoptim \
    g++ \
    libxrender1 \
    libfontconfig

RUN docker-php-ext-install -j$(nproc) iconv mcrypt
RUN docker-php-ext-install intl
RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Warsaw /etc/localtime
RUN "date"

# install xdebug
# xdebug and PHP config in php.ini
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

WORKDIR /var/www/html
