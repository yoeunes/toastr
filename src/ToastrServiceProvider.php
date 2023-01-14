<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

namespace Yoeunes\Toastr;

use Flasher\Laravel\Support\ServiceProvider;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function afterBoot()
    {
        $this->publishes(array(
            __DIR__.'/../config/toastr.php' => config_path('toastr.php'),
        ));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function afterRegister()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/toastr.php',
            'toastr'
        );

        $this->registerToastr();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return array(
            'toastr',
        );
    }

    /**
     * @return ToastrPlugin
     */
    public function createPlugin()
    {
        return new ToastrPlugin();
    }

    /**
     * @return void
     */
    private function registerToastr()
    {
        $this->app->singleton('toastr', function ($app) {
            $options = $app['config']->get('toastr.options', array());

            return new Toastr($app['flasher.toastr'], $options);
        });

        $this->app->alias('toastr', 'Yoeunes\Toastr\Toastr');
    }
}
