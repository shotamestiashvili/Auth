<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRequestLogRepository;
use App\Repositories\UserRequestLogRepositoryInterface;
use App\Repositories\UserTokenRepository;
use App\Repositories\UserTokenRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, function ($app) {
            return new UserRepository();
        });

        $this->app->bind(UserTokenRepositoryInterface::class, function ($app) {
            return new UserTokenRepository();
        });

        $this->app->bind(UserRequestLogRepositoryInterface::class, function ($app) {
            return new UserRequestLogRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
