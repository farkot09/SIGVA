FROM php:8.2-apache 

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilitar mod_rewrite (si usas .htaccess)
RUN a2enmod rewrite

# Copia archivos si es necesario
WORKDIR /var/www/html
