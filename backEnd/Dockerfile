FROM php:8.1-apache

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY . ${APACHE_DOCUMENT_ROOT}

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]