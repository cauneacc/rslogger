FROM php:8.2-cli

WORKDIR /rsLoggerTestApplication
COPY rsLoggerTestApplication .
RUN  apt-get update && apt-get upgrade -y && \
    apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    zlib1g-dev && \
    docker-php-ext-install zip && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-install pdo_mysql && \
    curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
CMD bash -c "composer install && tail -f /dev/null"
# ENTRYPOINT ["tail", "-f", "/dev/null"]