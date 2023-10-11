# Use an official PHP runtime as a parent image
FROM php:8.0-fpm

# Set the working directory to /var/www
WORKDIR /var/www

# Copy the current directory contents into the container at /var/www
COPY . /var/www

# Install any needed packages specified in the composer.json
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libxml2 \
    libxml2-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath opcache xml curl zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel
RUN composer install

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]

# Use an official Nginx runtime as a parent image
FROM nginx:latest

# Copy the Nginx site configuration
COPY laravel-nginx.conf /etc/nginx/conf.d/default.conf

# Expose port 80 and 443 for HTTP and HTTPS
EXPOSE 80
EXPOSE 443

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]

# Use an official MySQL runtime as a parent image
FROM mysql:latest

# Set the MYSQL_ROOT_PASSWORD environment variable
ENV MYSQL_ROOT_PASSWORD=root_password

# Expose port 3306 for MySQL
EXPOSE 3306
