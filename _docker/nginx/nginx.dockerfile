# FROM nginx
FROM nginx:stable-alpine

ENV NGINXUSER=danvop
ENV NGINXGROUP=danvop

RUN mkdir -p /var/www/html/public

ADD ./default.conf /etc/nginx/conf.d/default.conf

RUN sed -i "s/user www-data/user ${NGINXUSER}/g" /etc/nginx/nginx.conf

RUN adduser -g ${NGINXGROUP} -s /bin/sh -D ${NGINXUSER}
