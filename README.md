php artisan make:controller RoleController
php artisan make:seeder RoleSeeder
php artisan make:model namaDatabase --migration

-> Clear Application Cache
php artisan cache:clear

-> Clear Route Cache
php artisan route:clear

-> Clear Configuration Cache
php artisan config:clear

-> Clear Compiled Views Cache
php artisan view:clear
