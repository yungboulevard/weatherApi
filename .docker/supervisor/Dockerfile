FROM php:8.1.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev\
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    nano \
    unzip \
    git \
    curl \
    libz-dev \
    libpq-dev \
    libmemcached-dev \
    cron \
    supervisor \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


RUN pecl install pcov && docker-php-ext-enable pcov


# Install extensions
RUN docker-php-ext-install mbstring zip exif pcntl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get update && apt-get install -y libicu-dev libonig-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install mbstring
RUN docker-php-ext-enable intl mbstring

RUN pecl install redis && docker-php-ext-enable redis

RUN mkdir -p "/etc/supervisor/logs"

COPY ./supervisord.conf /etc/supervisor/supervisord.conf

CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]
