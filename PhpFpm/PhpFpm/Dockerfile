FROM php:8.2-fpm-alpine

RUN apk upgrade
RUN apk add procps
RUN apk add --no-cache bash
 
# Apache の起動
ENTRYPOINT ["php-fpm"]
