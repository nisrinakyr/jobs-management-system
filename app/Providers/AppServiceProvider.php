<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
       // Memaksa HTTPS jika mendeteksi domain Azure atau di environment production
        if (config('app.env') === 'production' || str_contains(config('app.url'), 'azurewebsites')) {
            URL::forceScheme('https');
        }
    }
}
