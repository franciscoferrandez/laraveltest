# Partimos de la imagen php en su versión 7.4
FROM php:8.2-fpm

# Copiamos los archivos package.json composer.json y composer-lock.json a /var/www/
COPY html/composer*.json /var/www/

# Nos movemos a /var/www/
WORKDIR /var/www/

# Instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl

# Instalamos extensiones de PHP
RUN apt-get install -y libpq-dev && docker-php-ext-install pdo_mysql pdo_pgsql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Instalamos composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos dependendencias de composer
RUN composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts

# Core dependencies
RUN apt-get update && apt-get install -y curl sudo

# Node
# Uncomment your target version
# RUN curl -fsSL https://deb.nodesource.com/setup_10.x | sudo -E bash -
# RUN curl -fsSL https://deb.nodesource.com/setup_12.x | sudo -E bash -
# RUN curl -fsSL https://deb.nodesource.com/setup_14.x | sudo -E bash -
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
RUN sudo apt-get install -y nodejs npm
RUN echo "NODE Version:" && node --version
RUN echo "NPM Version:" && npm --version


# Copiamos todos los archivos de la carpeta actual de nuestra
# computadora (los archivos de laravel) a /var/www/
COPY ./html /var/www/

# Exponemos el puerto 9000 a la network
EXPOSE 9000

# Corremos el comando php-fpm para ejecutar PHP
CMD ["php-fpm"]