# Naterra2

An educational Laravel game with map-based navigation, levels, and quizzes.

## Requirements

- **PHP 8.1+** with the following extensions:
  - `pdo_pgsql` (PostgreSQL driver) ⚠️ **Required for Supabase**
  - `pgsql`
- **Composer**
- **Node.js & npm**

### ⚠️ Important: PostgreSQL Driver Setup

This project uses **Supabase** (PostgreSQL) as the database. You must enable the PostgreSQL PHP extensions:

1. Open your `php.ini` file
2. Uncomment or add these lines:
   ```ini
   extension=pdo_pgsql
   extension=pgsql
   ```
3. Restart your web server

**Verify the driver is enabled:**
```bash
php -m | grep pgsql
```
Expected output: `pdo_pgsql` and `pgsql`

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env` and configure your Supabase credentials
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
