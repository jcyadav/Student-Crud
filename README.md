# Student CRUD + API (Laravel)

## Setup
composer install
cp .env.example .env
php artisan key:generate

## DB
php artisan migrate --seed

## Run
php artisan serve

## API
POST /api/register
POST /api/login

Protected:
GET /api/students
POST /api/students
GET /api/students/{id}
PUT /api/students/{id}
DELETE /api/students/{id}

Header:
Authorization: Bearer TOKEN
