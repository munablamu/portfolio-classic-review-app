release: php artisan migrate --seed && php app/Console/src/upload_to_cloudinary.php && php artisan scout:import "App\Models\Music" && php artisan scout:import "App\Models\Artist" && php artisan scout:import "App\Models\Review"
web: vendor/bin/heroku-php-apache2 public/
