#!/bin/sh

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating .env file for env $APP_ENV"
    cp .env.example .env
else
    echo ".env file exists"
fi

php-fpm -D

php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve --port=80 --host=0.0.0.0

exec "$@"
