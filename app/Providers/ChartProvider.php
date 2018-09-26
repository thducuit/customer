<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ChartService;

class ChartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\ChartService', function ($app) {
            return new ChartService();
        });
    }
}
