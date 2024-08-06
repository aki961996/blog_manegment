# Blog Management System

A Laravel-based blog management system with category-based filtering and Mail functions, user authentication, and CRUD operations .

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Routes](#routes)
- [Migrations](#migrations)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/aki961996/blog_manegment.git
   cd blog-management

   .env file and set up your environment variables:cp .env.example .env

   Generate an application key:php artisan key:generate
   
   Run migrations and seed the database: php artisan migrate

    seed the database : php artisan db:seed --class=UserSeeder
    seed the database : php artisan db:seed --class=CategorySeeder


    php artisan serve

   
