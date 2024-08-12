FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && \
	apt-get install -y \
	default-mysql-client \
	default-mysql-server \
	git \
	&& apt-get clean \
	&& rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install mysqli


COPY apache-config.conf /etc/apache2/sites-available/000-default.conf


COPY . ./var/www/html
RUN chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite


EXPOSE 80
