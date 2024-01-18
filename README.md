# Title: Mini Blog Application with Laravel and SQLite (Memory)

The objective of this assignment is to assess your basic skills in Laravel and your ability to work with an SQLite in-memory database. You are required to build a simplified blog application within a time constraint of 5 hours, utilizing Laravel with an SQLite in-memory database.

## Installation

1. Clone the repository
```bash
git clone https://github.com/alessiogarifo92/flexpedia-assignment.git
```
2. Change to the project directory
```bash
cd project
```
3. Install Composer dependencies
```bash
composer install
```
4. Copy the `.env.example` file to create your own `.env` file.
```bash
cp .env.example .env
```
5. Generate an app encryption key
```bash
php artisan key:generate
```
6. Create a new sqlite database with:

```bash
touch database/blog_post.sqlite
```

 And update the `.env` file with:
 ```bash
 DB_CONNECTION=sqlite
 DB_DATABASE= absolute/path/to/database/sqlite
 DB_FOREIGN_KEYS=true
```

7. Run the database migrations
```bash
php artisan migrate
```
8. Seed the database with some data
```bash
php artisan db:seed --class=DatabaseSeeder
```

## Usage

To start the application, you can use the serve Artisan command. This command will start a development server at http://localhost:8000:
```bash
php artisan serve
```

and use the command:
```bash
npm run dev
```

