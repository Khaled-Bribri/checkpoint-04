FROM php:8.1-apache

# Installation des dépendances
RUN apt-get update && apt-get install -y \
    git \
    libicu-dev \
    libpq-dev \
    zip \
    unzip

# Installation des extensions PHP
RUN docker-php-ext-install \
    intl \
    pdo \
    pdo_pgsql \
    opcache

# Installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configuration du serveur Apache
COPY docker/vhosts.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Copie du code source du projet
WORKDIR /var/www/html
COPY . /var/www/html

# Installation des dépendances du projet
RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

# Configuration des permissions des fichiers
RUN chown -R www-data:www-data /var/www/html/var
RUN chmod -R 777 /var/www/html/var
