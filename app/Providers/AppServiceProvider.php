<?php

namespace App\Providers;

use App\Repositories\UserLink\UserLinkRepository;
use App\Services\UserLink\UserLinkService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserLinkService::class, function () {
            return new UserLinkService(new UserLinkRepository());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
