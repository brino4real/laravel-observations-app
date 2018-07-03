# laravel-observations-app
Simple app to manage observations on species

### Quck Installation ###

* `git clone https://github.com/brino4real/laravel-observations-app.git observations-app`
* `cd observations-app`
* `composer install`
* Create a database and update .env file
* `php artisan migrate` to create database tables
* `php artisan db:seed --class=SpeciesTableSeeder` to populate species table with some sample species (/database/seeds/SpeciesTableSeeder.php)
* `php artisan serve` to start the app on http://localhost:8000/

[Complete Tutorial](https://softtechcentre.pro)
