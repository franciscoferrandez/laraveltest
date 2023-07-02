FROM php:8.2.7-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf


RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        libzip-dev \
        cron \
        tzdata \
        ssl-cert \
        libicu-dev \
        libxslt-dev \
        librabbitmq-dev \
        supervisor \
        logrotate \
        wget \
        locales \
        xfonts-75dpi \
        libcurl4-openssl-dev \
        pkg-config \
        libssl-dev \
        unzip

RUN pecl install amqp

RUN docker-php-ext-enable amqp

RUN docker-php-ext-configure \
    gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/; \
    PHP_OPENSSL=yes docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap ; \
  docker-php-ext-install \
    gd \
    intl \
    mbstring \
    mysqli \
    pdo_mysql \
    xsl \
    zip \
    opcache \
    bcmath \
    soap \
    sockets \
    pcntl

RUN apt-get -y update
RUN apt-get -y install git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer