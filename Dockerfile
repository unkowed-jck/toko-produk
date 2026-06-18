FROM dunglas/frankenphp:php8.5

RUN install-php-extensions \
    pdo_pgsql \
    pgsql \
    mbstring \
    intl \
    zip \
    opcache \
    exif \
    pcntl \
    gd \
    bcmath

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN if [ -f package.json ]; then \
    npm install && npm run build; \
    fi

RUN php artisan storage:link || true

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080