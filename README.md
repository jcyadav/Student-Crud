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
GET /api/v1/students
POST /api/v1/students
GET /api/v1/students/{id}
PUT /api/v1/students/{id}
DELETE /api/v1/students/{id}

Header:
Authorization: Bearer TOKEN
