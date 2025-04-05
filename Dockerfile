FROM php:8.3-fpm

# Instalacja zależności systemowych
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev \
    libjpeg-dev libfreetype6-dev libssl-dev && \
    docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Instalacja Composera
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Ustawienie katalogu roboczego
WORKDIR /var/www

# Kopiowanie plików projektu (na razie puste)
COPY . .

# Instalacja zależności (jeśli są)
# RUN composer install

# Uprawnienia
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Domyślne polecenie
CMD php artisan serve --host=0.0.0.0 --port=8000
