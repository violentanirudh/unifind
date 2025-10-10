<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('delete-item', [\App\Policies\ItemPolicy::class, 'delete']);
        Gate::define('update-item', [\App\Policies\ItemPolicy::class, 'update']);

        Gate::define('is-admin', function (\App\Models\User $user) {
            return $user->isAdmin();
        });
    }
}
