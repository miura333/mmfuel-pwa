FROM php:7.4-fpm

# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
curl \
gnupg \
python

RUN apt-get update \
    && apt-get install -y libpq-dev libzip-dev libpng-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev && docker-php-ext-install gd

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

WORKDIR /var/www/html
