ARG PHP_VERSION=7.2
ARG ALPINE_VERSION=3.13

FROM php:${PHP_VERSION}-cli-alpine${ALPINE_VERSION}

RUN apk add --update-cache \
    zip unzip \
  && rm -rf /var/cache/apk/*

ENV COMPOSER_HOME=/.composer-home
WORKDIR /.composer-home
RUN chmod 777 /.composer-home

COPY .docker/install-composer.sh .
RUN ./install-composer.sh
