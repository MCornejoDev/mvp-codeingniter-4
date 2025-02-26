# Imagen base con PHP 8.4 y Apache
FROM php:8.4-apache

ARG NODE_VERSION=22

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    mariadb-client \
    curl \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo_mysql mbstring exif pcntl bcmath gd mysqli

# Instalar Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_$NODE_VERSION.x | bash && \
    apt-get install -y nodejs

# Habilitar mod_rewrite para CodeIgniter
RUN a2enmod rewrite

# Configurar Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Configurar la carpeta de trabajo
WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Exponer el puerto de Apache
EXPOSE 80

# Comando para iniciar Apache
CMD ["bash", "-c", "chown -R www-data:www-data /var/www/html/writable && chmod -R 775 /var/www/html/writable && apache2-foreground"]