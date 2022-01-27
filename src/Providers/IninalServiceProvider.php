<?php

namespace ErdalDemirci\Ininal\Providers;

/*
 * Class IninalServiceProvider
 * @package ErdalDemirci\Ininal
 */

use Illuminate\Support\ServiceProvider;
use ErdalDemirci\Ininal\Services\Ininal as IninalClient;

class IninalServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('ininal.php'),
        ]);

        // Publish Lang Files
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'ininal');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerIninal();

        $this->mergeConfig();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerIninal()
    {
        $this->app->singleton('ininal_client', static function () {
            return new IninalClient();
        });
    }

    /**
     * Merges user's and ininal's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php',
            'ininal'
        );
    }
}
