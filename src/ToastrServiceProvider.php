<?php

namespace Yoeunes\Toastr;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use function var_dump;
use function var_export;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__.'/../config/toastr.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('toastr.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('toastr');
            $this->app->configure('session');
        }

        $this->mergeConfigFrom($source, 'toastr');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('toastr', function (Container $app) {
            return new Toastr($app['session'], $app['config']);
        });

        $this->app->alias('toastr', Toastr::class);

        if ($this->app instanceof LumenApplication) {
            $this->app->register(\Illuminate\Session\SessionServiceProvider::class);
        }

        $this->registerBladeDirectives();
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

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'toastr',
        ];
    }
}
