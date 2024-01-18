FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    libicu-dev \
    g++

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY . ${APACHE_DOCUMENT_ROOT}

RUN composer install

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]