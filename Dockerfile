FROM php:7.2-apache

RUN sed -i \
        -e 's|http://deb.debian.org/debian|http://archive.debian.org/debian|g' \
        -e 's|http://security.debian.org/debian-security|http://archive.debian.org/debian-security|g' \
        -e '/buster-updates/d' \
        /etc/apt/sources.list \
    && apt-get -o Acquire::Check-Valid-Until=false update \
    && apt-get install -y --no-install-recommends \
        default-mysql-client \
        git \
        libonig-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install mbstring pdo_mysql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --no-interaction --no-scripts --optimize-autoloader \
    && chmod +x docker/apache-start.sh \
    && chown -R www-data:www-data storage bootstrap/cache

CMD ["docker/apache-start.sh"]
