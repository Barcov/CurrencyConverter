# Exchangly - Exchange API

# Setup

Ensure that your environment
meets [Laravel 10 server requirements](https://laravel.com/docs/8.x/deployment#server-requirements)

## Clone the repository

```bash
git clone https://github.com/Barcov/CurrencyConverter.git
cd CurrencyConverter/api
```

## Create a sqlite database

```bash
touch database/database.sqlite
```

## Create a .env.

- You can use the .env.example file as a template.
- Update the following variables:

### Development environment

```env
```.env
APP_NAME=ExchangeRateApi
APP_ENV=local
APP_KEY=base64:g/cC2Gwkre0L4fPYwtecqKHfxqZICqYK2r0WhicQdmA=
APP_DEBUG=true

DB_CONNECTION=sqlite
DB_DATABASE=/full-path-to-app/database/database.sqlite

QUEUE_CONNECTION=database

FIXERIO_API_KEY=YOUR_API_KEY
FIXERIO_CACHE_TTL=0
FIXERIO_DB_CACHE_TTL=0

```

#### API Cache TTL

When this value is set to 0 the Fixer.io API will be hit on every API request.
TTL in seconds is used to serve cached entries from the database.
Once this expires the Fixer.io endpoint will be called to update currency data.

Useful TTL values are 300 (5 Minutes) 3600 (1 hour), 86400 (1 day), 604800 (1 week), 2592000 (1 month)

#### DB Cache TTL

When this value is set to 0, exchange rates from the Local DB will not be cached.
TTL in seconds is used to cached database calls. By default, cache is on the filesystem.
You can configure Redis or any supported cache drivers for laravel to cache queries in memory.
It's recommended that this TTL be smaller than the API Cache TTL to ensure that the database is updated with fresh data.

Useful TTL values are 300 (5 Minutes) 3600 (1 hour), 86400 (1 day), 604800 (1 week), 2592000 (1 month)

## Install dependencies and run the migrations

```bash
composer install
php artisan migrate
```

## Run the tests

Ensure all tests pass

```bash
php artisan test
```

## Run the server

```bash
php artisan serve
```
