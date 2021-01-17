### Installation

Run the following commands after cloning the repository.

    cp .env.example  .env
    composer install 
    php artisan key:generate

Now configure the database credentials in `.env` file and run the bellow command to create tables.

    php artisan migrate

> This project is developed by using [laravel](https://laravel.com) framework.