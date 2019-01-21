#!/bin/sh

cd /application
php artisan migrate:refresh --seed
php artisan migrate:refresh --seed
