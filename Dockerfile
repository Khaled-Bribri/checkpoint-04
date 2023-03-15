FROM php:8.1-apache
WORKDIR /var/www/html

# Install required PHP extensions
RUN docker-php-ext-install pdo_mysql

# Copy the application code into the container
COPY . /var/www/html

# Set up Apache
RUN a2enmod rewrite

# Expose port 80 for the Apache server
EXPOSE 9000
