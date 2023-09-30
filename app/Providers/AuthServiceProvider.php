<?php

namespace App\Providers;

use App\Auth\AuthTokenGuard;
use App\Auth\AuthUserProvider;
use App\Models\UserToken;
use App\Policies\TokenPolicy;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserTokenRepositoryInterface;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        UserToken::class => TokenPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Auth::provider('access_token', function ($app, array $config) {
            return new AuthUserProvider(
                $app->make(UserTokenRepositoryInterface::class),
                $app->make(UserRepositoryInterface::class)
            );
        });

        Auth::extend('token', function ($app, $name, array $config) {
            return new AuthTokenGuard(Auth::createUserProvider('access_token'), $app->request);
        });
    }
}
