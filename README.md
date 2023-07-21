# laravel-sample
docker-compose up -d

cd ./laravel-sample/laravel   
docker exec laravel-sample-php-fpm-1 php artisan migrate   
docker exec laravel-sample-php-fpm-1  php artisan db:seed

php artisan config:clear 

docker exec laravel-sample-php-fpm-1 php artisan migrate --env=testing
docker exec laravel-sample-php-fpm-1  php artisan db:seed --env=testing
