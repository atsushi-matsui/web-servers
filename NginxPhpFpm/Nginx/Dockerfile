FROM nginx:1.23-alpine

RUN apk update
RUN apk add apache2-utils

# settings
COPY settings/default.conf /etc/nginx/conf.d/default.conf
COPY settings/nginx.conf /etc/nginx/nginx.conf
