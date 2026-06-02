FROM php:8.1-apache

# Instala extensão PDO MySQL necessária para o projeto
RUN docker-php-ext-install pdo pdo_mysql

# Copia todo o código da aplicação para o DocumentRoot do Apache
COPY . /var/www/html/

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
