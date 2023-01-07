FROM php:8.2.0-apache

RUN apt update

# event module用の設定を追加
COPY settings/mpm_prefork.conf /etc/apache2/mods-available/mpm_prefork.conf

## 再起動
RUN service apache2 restart
