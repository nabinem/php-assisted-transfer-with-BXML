# Docker file for running Bandwidth's PHP endpoint examples
# Before running this in production, you should review security and other settings 

FROM php:5-apache

# Install composer dependencies

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --install-dir=/usr/local/sbin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Turn Indexes (back) on
RUN sed -i '/Options -Indexes/c\\tOptions +Indexes' /etc/apache2/conf-enabled/docker-php.conf

# Change the documentRoot to our web folder
RUN sed -i '/DocumentRoot/c\\tDocumentRoot \/var\/www\/web' /etc/apache2/sites-available/000-default.conf

# Install PHP packages with composer

WORKDIR /var/www
COPY composer.json /var/www
RUN composer update

# Add the rest of our code and scripts

COPY . /var/www
