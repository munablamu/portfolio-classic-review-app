release: php artisan migrate
release: php artisan db:seed
release: php app/Console/src/upload_to_cloudinary.php
release: php artisan scout:import "App\Models\Music"
release: php artisan scout:import "App\Models\Artist"
release: php artisan scout:import "App\Models\Review"
web: vendor/bin/heroku-php-apache2 public/
