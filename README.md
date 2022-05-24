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

## Tests

The test suite can be run by running the following command:

```bash
./vendor/bin/phpunit
```
