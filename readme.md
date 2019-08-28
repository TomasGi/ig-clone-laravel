# IG clone built on laravel for learning purposes

> IG clone

## Build Setup

``` bash
# install dependencies
$ composer update
$ composer install

# create database and update .env file
#if .env file is missing
$ copy .env.example .env

# create encryption key
php artisan key:generate

#create storage link
php artisan storage:link

# migrate database
$ php artisan migrate

# launch server
$ php artisan serve

For detailed explanation on how things work, check out [Laravel docs docs](https://laravel.com/).
