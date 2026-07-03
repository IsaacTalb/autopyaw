<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Business;
use App\Scopes\TenantScope;

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
        // Apply the tenant global scope to every model that uses the HasBusiness trait.
        Business::addGlobalScope(new TenantScope());
    }
}
