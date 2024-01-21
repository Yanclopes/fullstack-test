FROM php:8.1-apache
LABEL authors="Yan"

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    libicu-dev \
    g++ \

RUN apt-get install -y certbot

docker run -it --rm --name certbot \
  -v certbot_data:/etc/letsencrypt \
  certbot/certbot certonly --standalone -d previsaotempo.online

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN echo "ServerName  18.117.187.5" >> /etc/apache2/apache2.conf
COPY . ${APACHE_DOCUMENT_ROOT}

RUN composer install --no-dev --optimize-autoloader

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]