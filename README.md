# AniNation

My exam project AniNation consists of an anime themed blog website.

- [Installation](#installation)
    - [System requirements](#system-requirements)
    - [Setup for development](#setup-for-development)
- [Tests](#tests)

## Installation

### System requirements

- Laravel 9.0 or greater
- PHP 8.0 or greater
- Node 14 or greater
- Alpine.js
- Composer
- NPM
- MySQL
- Homebrew (optional for installing software)

### Setup for development

- Clone the repository
- Install Composer dependencies:
  ```bash
  composer install
  ```
- Create an environment file:
  ```bash
  cp .env.example .env
  php artisan key:generate
  ```
- Install NPM dependencies and build assets:
  ```bash
  npm ci
  npm run dev
  ```
- Run migrations:
  ```bash
  php artisan migrate --seed
  ```
  Or
  ```bash
  php artisan migrate
  php artisan db:seed
  ```
- Valet park so you can access website with "name".test:
  ```bash
  composer global require laravel/valet
  valet install
  valet link (name of current directory)
  ```
  To test if it works:
  ```bash
  ping foobar.test
  ```

## Tests

The test suite can be run by running the following command:

```bash
./vendor/bin/phpunit
```
