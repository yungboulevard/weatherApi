FROM php:8.2.18-fpm

# Set working directory
WORKDIR /var/www/public

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

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

RUN chmod -R 775 /var/www/public

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/public

RUN touch /var/log/cron-1.log
RUN (crontab -l ; echo "* * * * * php /var/www/public/artisan schedule:run >> /dev/null 2>&1") | crontab -

# Cleaning
RUN apt-get clean && apt-get autoremove -y


# set timezone
ENV TZ="Europe/Moscow"
# Change current user to www

USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
