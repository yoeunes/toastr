<?php

namespace Yoeunes\Toastr;

use Illuminate\Support\ServiceProvider;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/toastr.php' => config_path('toastr.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/toastr.php', 'toastr');

        $this->app->singleton('toastr', function () {
            return new Toastr();
        });
    }
}
