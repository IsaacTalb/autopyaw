<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register any custom bindings if needed.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tenant scoping is attached by models that use the BelongsToBusiness concern.
    }
}
