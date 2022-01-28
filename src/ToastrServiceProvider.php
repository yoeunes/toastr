<?php

namespace Yoeunes\Toastr;

use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication) {
            $this->publishes([$this->configPath() => config_path('toastr.php')], 'toastr-config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('toastr');
        }

        $this->registerBladeDirectives();
    }

    /**
     * Set the config path.
     *
     * @return string
     */
    protected function configPath()
    {
        return toastr_path(__DIR__.'/../config/toastr.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'toastr');

        if ($this->app instanceof LumenApplication) {
            $this->app->register(\Illuminate\Session\SessionServiceProvider::class);
            $this->app->configure('session');
        }

        $this->app->singleton('toastr', function (Container $app) {
            return new Toastr($app['session'], $app['config']);
        });

        $this->app->alias('toastr', Toastr::class);
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

        Blade::directive('jquery', function ($arguments) {
            $version = $arguments;

            if (strpos($arguments, ',')) {
                [$version, $src] = explode(',', $arguments);
            }

            if (isset($src)) {
                return "<?php echo jquery($version, $src); ?>";
            }

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
