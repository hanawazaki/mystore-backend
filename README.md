# Backend shayna store

Backend shayna store adalah aplikasi backend untuk mendukung data aplikasi frontend shayna-store
yang mengguanakan vueJS seperti API dan admin. shayna store adalah project dari www.buildwithangga.com online course. 
Sedikit perubahan dengan laravel 8 dan stisla (www.getstisla.com) sebagai theme nya.

<b>Setup and Installation<b>
1. Run `git clone project https://github.com/hanawazaki/mystore-backend.git`
2. Run `composer install`
3. Run `php artisan storage:link`
4. Create folder `assets/product` in `storage/app/public` (sementara manual dulu)
5. Copy `.env.example` file to `.env file`

<b>Create database<b>
1. Create database
2. run `php artisan migrate`
3. run `php artisan db:seed`

login with <br>
username : admin@admin.com<br>
password : password
