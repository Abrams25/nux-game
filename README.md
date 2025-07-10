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

## Project structure

```text
app/
├── Dtos/
│   └── LuckyResultDto.php
├── Http/
│   ├── Controllers/
│   │   ├── LinkController.php
│   │   └── RegisterController.php
│   ├── Middleware/
│   │   └── CheckLinkIsValid.php
│   └── Requests/
│       └── RegisterRequest.php
├── Models/
│   ├── LuckyAttempt.php
│   └── UserLink.php
├── Repositories/
│   ├── LuckyAttempt
│   │    └── LuckyAttemptRepository.php
│   └── UserLink
│        └── UserLinkRepository.php
├── Services/
│   ├── LuckyAttempt
│   │   ├── LuckyService.php
│   │   ├── LuckyTypes.php
│   │   └── LuckyWinCalculator.php
│   └── UserLink/
│       └── UserLinkService.php
database/
├── migrations/
│   ├── 2025_07_10_113229_create_user_links_table.php
│   └── 2025_07_10_120659_create_lucky_attempts_table.php
└── database.sqlite
resources/
└── views/
    ├── link.blade.php
    ├── lucky_result.blade.php
    ├── history.blade.php
    └── register.blade.php
routes/
└── web.php

.env.example
README.md
docker-compose.yml

docker/
├── nginx/
│   └── default.conf
└── php/
    └── Dockerfile
```
