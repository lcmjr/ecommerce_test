FROM phpdockerio/php73-fpm:latest
ARG APP_DIR="/application"
WORKDIR ${APP_DIR}

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    locales \
    && echo '' >> /usr/share/locale/locale.alias \
    && sed -i 's/# pt_BR.UTF-8 UTF-8/pt_BR.UTF-8 UTF-8/' /etc/locale.gen \
    && locale-gen

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.3-mysql php-redis \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

ADD waitForMySQL.sh /root/
RUN chmod +x /root/waitForMySQL.sh

#Permissão para a pasta storage, instala as dependencias, cria a estrutura de banco e roda o listener do php
CMD chmod -R 775 storage && chown -R www-data storage && cp .env.example .env && composer install && php artisan migrate:refresh --seed && php-fpm
