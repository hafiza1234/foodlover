### Installation

Run the following commands after cloning the repository.
    git clone https://github.com/hafiza1234/foodlover.git
    cd foodlover
    cp .env.example  .env
    composer install 
    php artisan key:generate

Now configure the database credentials in `.env` file and run the bellow command to create tables.

    php artisan migrate
    php artisan public:link

Run the application by the following command:

    php artisan serve

> This project is developed by using [laravel](https://laravel.com) framework.