FROM node:14.1 as builderjs

WORKDIR /var/www/html/
COPY ./ .
RUN npm install && npm run prod


FROM php:7.4.5-apache

WORKDIR /var/www/html/
COPY --from=builderjs /var/www/html .

RUN apt update && apt install -y unzip
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install


ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN chmod -R 777 storage public/upload
RUN a2enmod rewrite

COPY ./docker-php-entrypoint /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-php-entrypoint