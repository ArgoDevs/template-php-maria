#!/bin/bash

# Images name
MARIA_DB="maria"
PHP_APACHE="php"

DOCKER_PS=$(docker ps)
echo $DOCKER_PS
# Search mariadb container ip
CONTAINER=$(grep $MARIA_DB <<< "${DOCKER_PS}" | awk '{print $1}')
if [[ -z $CONTAINER ]]; then
    printf "MariaDB container not found!\n"
else
    IP_DB=$(docker inspect $CONTAINER | grep -E '"IPAddress": "[0-9.]+' | grep -Eo [0-9.]+)
    printf "MariaDB container    ip: $IP_DB\n"
fi

# Search php-apache container ip
CONTAINER=$(grep $PHP_APACHE <<< "${DOCKER_PS}" | awk '{print $1}')
if [[ -z $CONTAINER ]]; then
    printf "Php/Apache container not found!\n"
else
    IP_PHP=$(docker inspect $CONTAINER | grep -E '"IPAddress": "[0-9.]+' | grep -Eo [0-9.]+)
    printf "Php/Apache container ip: $IP_PHP\n"
fi

