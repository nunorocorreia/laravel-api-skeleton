# Laravel API Project

This is a Laravel API project that uses Herd for local development.

## Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL
- Herd (Laravel development environment)
- Node.js (for frontend assets)

## Setup Instructions

1. Clone the repository
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Create a `.env` file from `.env.example`:
   ```bash
   cp .env.example .env
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
   ```

## Development Commands

### Server Management
- Start the development server (if not using Herd):
  ```bash
  php artisan serve
  ```
- Clear various caches:
  ```bash
  php artisan config:clear
  php artisan route:clear
  php artisan cache:clear
  ```

### Creating New Components
- Create a new controller:
  ```bash
  php artisan make:controller ControllerName
  ```
- Create a new request validation:
  ```bash
  php artisan make:request RequestName
  ```
- Create a new model:
  ```bash
  php artisan make:model ModelName -m -f
  ```
- Create a new migration:
  ```bash
  php artisan make:migration migration_name
  ```

### Database
- Run migrations:
  ```bash
  php artisan migrate
  ```
- Rollback last migration:
  ```bash
  php artisan migrate:rollback
  ```
- Reset all migrations:
  ```bash
  php artisan migrate:reset
  ```

### Testing
- Run tests:
  ```bash
  php artisan test
  ```

## API Routes
The API is accessible at:
- Base URL: `http://localhost:8000/api/`
- Welcome endpoint: `GET /api/`

## Troubleshooting
If you encounter the "Target class [cache.store] does not exist" error:
1. Make sure all service providers are properly registered in `config/app.php`
2. Run `php artisan config:clear`
3. Run `php artisan route:clear`
4. 
