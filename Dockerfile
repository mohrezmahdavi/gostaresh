FROM php:8.0-fpm

# Arguments defined in docker-compose.yml
ARG user=alireza
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    libssl-dev \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    supervisor

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml zip

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir /home/$user
RUN chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www/html

COPY . /var/www/html


# RUN chown -R www-data:www-data *

COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container
COPY docker/php.ini /usr/local/etc/php/conf.d/bpms.ini

RUN chmod o+w -R storage

# USER $user

EXPOSE 80 443

ENTRYPOINT ["start-container"]
