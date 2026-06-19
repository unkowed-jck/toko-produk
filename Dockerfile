# ===============================
# Stage 1 : Composer
# ===============================
FROM composer:2 AS composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --prefer-dist \
    --optimize-autoloader \
    --no-interaction

COPY . .

RUN composer dump-autoload --optimize

# ===============================
# Stage 2 : Node Build
# ===============================
FROM node:22 AS node

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

# ===============================
# Stage 3 : Runtime
# ===============================
FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_pgsql pgsql

WORKDIR /app

COPY --from=composer /app /app

COPY --from=node /app/public/build ./public/build

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080