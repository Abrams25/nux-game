# Laravel Test Task

```bash
git clone https://github.com/Abrams25/nux-game.git
cd nux-game

cp .env.example .env

touch database/database.sqlite

docker-compose up -d --build
docker exec -it laravel_app composer install
docker exec -it laravel_app php artisan key:generate
docker exec -it laravel_app php artisan migrate
```

