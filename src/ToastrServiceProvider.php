<?php

namespace Yoeunes\Toastr;

use Illuminate\Support\Facades\Blade;
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

        $this->registerBladeDirectives();
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

    public function registerBladeDirectives()
    {
        Blade::directive('toastr_render', function () {
            return "<?php echo app('toastr')->render(); ?>";
        });

        Blade::directive('toastr_css', function ($version) {
            return "<?php echo toastr_css($version); ?>";
        });

        Blade::directive('toastr_js', function ($version) {
            return "<?php echo toastr_js($version); ?>";
        });

        Blade::directive('jquery', function ($version) {
            return "<?php echo jquery($version); ?>";
        });
    }
}
