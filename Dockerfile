FROM php:apache

# Update and upgrade packages
RUN apt-get update && apt-get upgrade -y

# activate PDO MySQL extension
RUN echo 'extension=pdo_mysql' >> /usr/local/etc/php/php.ini-development
RUN  echo 'extension=pdo_mysql' >> /usr/local/etc/php/php.ini-production

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Restart Apache to apply PHP changes
RUN service apache2 restart