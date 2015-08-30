# str-user-model php-cli
# @version 5.5-cli
FROM helder/php:5.5

RUN apt-install libssl-dev && \
    docker-php-pecl-install mongo xdebug && \
    apt-get purge -y --auto-remove libssl-dev

WORKDIR /var/www

VOLUME ["/usr/local/php/etc"]
