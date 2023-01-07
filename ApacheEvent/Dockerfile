# ベースイメージの指定
FROM centos/httpd:latest

# to use systemctl
RUN yum -y install httpd; yum clean all; systemctl enable httpd.service
EXPOSE 80
CMD ["/usr/sbin/init"]

# install packages for need for php build
RUN yum install -y pkg-config build-essential autoconf bison re2c libxml2-dev libsqlite3-dev
RUN yum install -y make libxml2-devel wget gcc
RUN yum install -y sqlite-devel
RUN yum install -y http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install -y oniguruma oniguruma-devel
RUN yum install -y httpd-devel 

# install php-src & build thread-safe version
RUN wget https://www.php.net/distributions/php-8.2.0.tar.gz
RUN tar -xvf php-8.2.0.tar.gz
WORKDIR /php-8.2.0
RUN ./configure \
  --with-apxs2=/usr/bin/apxs \
  --enable-mbstring \
  --enable-zts
RUN make -j4

# php modueをコピー
RUN cp libs/libphp.so /etc/httpd/modules/

# httpd.confでphpを起動できるように追加
COPY httpd/conf.d/php.conf /etc/httpd/conf.d/php.conf

# event module用の設定を追加
COPY httpd/conf.d/mpm_event-original.conf /etc/httpd/conf.d/mpm_event.conf

# mpmの設定をeventに変更
COPY httpd/conf.modules.d/00-mpm.conf /etc/httpd/conf.modules.d/00-mpm.conf

# 再起動
#RUN systemctl restart httpd
#RUN apachectl -V
