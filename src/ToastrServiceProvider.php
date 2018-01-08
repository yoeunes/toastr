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
        $this->mergeConfigFrom(__DIR__.'/config/toastr.php', 'toastr');

        $this->publishes([
            __DIR__.'/config/toastr.php' => config_path('toastr.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('toastr', function () {
            return new Toastr;
        });
    }
}
