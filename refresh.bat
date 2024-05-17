docker-compose exec app php artisan migrate:refresh
docker-compose exec app php artisan db:seed --class=Seed
