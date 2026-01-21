FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Create uploads folder + set permissions
RUN mkdir -p /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html/uploads

# Expose port
EXPOSE 80
