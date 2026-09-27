#!/usr/bin/env bash
set -e

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

mkdir -p database storage/framework/cache/data storage/framework/sessions storage/framework/views bootstrap/cache
touch database/database.sqlite
chmod -R 777 database storage bootstrap/cache

php artisan storage:link --force >/dev/null 2>&1 || true
php artisan config:clear --no-interaction
php artisan route:clear --no-interaction
php artisan view:clear --no-interaction
php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction

php artisan config:cache --no-interaction
php artisan route:cache --no-interaction
php artisan view:cache --no-interaction

exec "$@"
