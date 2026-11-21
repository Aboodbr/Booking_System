# Stage 1: build frontend assets
FROM node:20-bookworm AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: PHP application
FROM php:8.3-cli-bookworm
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libzip-dev libicu-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo_mysql pdo_sqlite zip intl mbstring bcmath curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY . .
COPY --from=assets /app/public/build public/build
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN cp .env.example .env \
    && touch database/database.sqlite \
    && php artisan key:generate --force
EXPOSE 10000
CMD ["bash", "docker-start.sh"]
