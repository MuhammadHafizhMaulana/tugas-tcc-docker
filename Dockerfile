FROM php:8.2-apache

# Enable mod_rewrite (optional jika perlu)
RUN a2enmod rewrite

# Copy source code ke direktori apache
COPY app/ /var/www/html/

# Set hak akses
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
