FROM php:7.0-fpm
MAINTAINER Chen Han <chen@kdl.co.jp>
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
#pdo_mysql and others
RUN apt-get update && apt-get install -y libmcrypt-dev libmemcached-dev zlibc zlib1g zlib1g-dev ImageMagick nkf libxml2 libxml2-dev
RUN docker-php-ext-install iconv mcrypt mbstring json xml mysqli pdo_mysql zip xml xmlrpc soap opcache
#cache and others..
RUN pecl install memcached xdebug redis \
    && docker-php-ext-enable memcached xdebug redis
RUN pecl install apcu channel://pecl.php.net/apcu_bc-1.0.3 \
    && docker-php-ext-enable apcu
