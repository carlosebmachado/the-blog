# Use official PHP image with Apache
FROM php:8.4-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy app files to container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Configure Apache
RUN echo "<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>" > /etc/apache2/conf-available/the-blog.conf \
    && a2enconf the-blog

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
