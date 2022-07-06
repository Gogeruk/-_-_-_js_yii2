FROM php:8.0-fpm

# PHP extensions
RUN apt update \
    && apt install -y \
        zlib1g-dev \
        libicu-dev \
        libffi-dev \
        librabbitmq-dev \
        libssh-dev \
        libgmp-dev \
        libssl-dev \
        libzip-dev \
        curl \
        cron \
        supervisor \
        g++ \
        git \
        wget \
        zip \
        vim \
        cmake \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install sockets \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && pecl install amqp \
    && docker-php-ext-enable amqp

# Install javascript dependencies
RUN apt install npm -y

# Install less-compiler
RUN npm -g install \
        less \
        lesshint \
        uglify-js \
        uglifycss


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Install Yii framework bash autocompletion
RUN curl -L https://raw.githubusercontent.com/yiisoft/yii2/master/contrib/completion/bash/yii \
        -o /etc/bash_completion.d/yii


# Set the working directory
WORKDIR /var/www/app



