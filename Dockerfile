# https://github.com/docker-library/php/tree/master/7.4/buster/apache
FROM php:7.4-apache-buster

COPY ./project  /var/project
COPY ./docker   /var/docker
COPY ./pac      /var/pac

RUN apt-get update
RUN apt-get install -y sudo wget git libicu-dev
RUN apt-get autoremove -y

RUN groupadd project
RUN useradd -g project project
RUN echo "project ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

RUN chown -R project. /var/pac /var/project

RUN docker-php-ext-configure intl

RUN docker-php-ext-install intl opcache

RUN pecl install apcu xdebug

RUN docker-php-ext-enable apcu xdebug

RUN rm /etc/apache2/sites-enabled/* /etc/apache2/sites-available/*
RUN ln -sf /var/docker/apache/apache.conf   /etc/apache2/conf-available/project.conf
RUN ln -sf /var/docker/apache/site.conf     /etc/apache2/sites-available/project.conf
RUN a2enconf project
RUN a2ensite project
RUN a2enmod  rewrite

RUN ln -sf /var/docker/php/config.ini /usr/local/etc/php/conf.d/project.ini

RUN ln -sf /var/docker/profile /etc/profile.d/project.sh

RUN wget -q -O /usr/local/bin/composer https://getcomposer.org/composer-stable.phar && chmod +x /usr/local/bin/composer

VOLUME [ "/var/project" ]

WORKDIR /var/project

USER project:project

ENTRYPOINT [ "sudo", "/var/docker/entrypoint.sh" ]

CMD [ "apache2-foreground" ]
