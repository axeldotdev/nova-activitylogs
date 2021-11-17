<?php

namespace Axeldotdev\Logs;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Axeldotdev\Logs\Resources\Log;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'logs');

        $this->app->booted(function () {
            Nova::resources([
                Log::class,
            ]);

            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            activity()->enableLogging();
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
