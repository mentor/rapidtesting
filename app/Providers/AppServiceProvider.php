<?php

namespace App\Providers;

use App\Services\ReenioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Reenio API
        $this->app->singleton(ReenioService::class, function() {
            return new ReenioService(
                env('REENIO_API_KEY'),
                env('REENIO_API_HOST', 'https://reenio.cz/sk/api/v1/admin')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
