# Laravel Test Task

```bash
git clone git@github.com:ваш/проект.git
cd проект

cp .env.example .env
touch database/database.sqlite

docker-compose up -d --build
docker exec -it laravel_app composer install
docker exec -it laravel_app php artisan key:generate
docker exec -it laravel_app php artisan migrate
```

