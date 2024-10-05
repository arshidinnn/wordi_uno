<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\RolePolicy;
use App\Services\AuthService;
use App\Services\FileService;
use App\Services\Root\WordService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WordService::class, WordService::class);
        $this->app->bind(AuthService::class, AuthService::class);
        $this->app->bind(FileService::class, FileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, RolePolicy::class);
    }
}
