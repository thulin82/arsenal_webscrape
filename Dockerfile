FROM php:8.2-apache
RUN apt-get update -y
RUN apt-get install zip unzip git -y
RUN a2enmod rewrite
#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
COPY . /var/www/html/
WORKDIR /var/www/html/
RUN composer install
EXPOSE 80