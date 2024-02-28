<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\WooCommerceService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(WooCommerceService::class, function () {
            return new WooCommerceService();
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
