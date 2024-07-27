# Setup .env
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:MH9yYWeYh2wjgBZrcvYRIttbUQxEiD5+BIYJXnYSkRY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```


# Installations
```
>php artisan make:model Student -m
>php artisan make:controller StudentController --resource
>php artisan make:import ProfessorsImport --model=Professor 
>php artisan make:export ProfessorsExport --model=Professor
>php artisan make:model ActivityRequest -m
>php artisan make:controller ActivityRequestController --resource

>composer global require laravel/installer
>composer require maatwebsite/excel
>composer install
>composer update
>php artisan key:generate
>php artisan db:seed
>php artisan key:generate
>php artisan serve

login
user: mdarlyn
pass: uicmdarlyn2020
```