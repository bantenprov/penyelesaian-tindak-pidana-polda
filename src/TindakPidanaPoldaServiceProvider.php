<?php

namespace Bantenprov\TindakPidanaPolda;

use Illuminate\Support\ServiceProvider;
use Bantenprov\TindakPidanaPolda\Console\Commands\TindakPidanaPoldaCommand;

/**
 * The TindakPidanaPoldaServiceProvider class
 *
 * @package Bantenprov\TindakPidanaPolda
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TindakPidanaPoldaServiceProvider extends ServiceProvider
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
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tindak-pidana-polda', function ($app) {
            return new TindakPidanaPolda;
        });

        $this->app->singleton('command.tindak-pidana-polda', function ($app) {
            return new TindakPidanaPoldaCommand;
        });

        $this->commands('command.tindak-pidana-polda');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'tindak-pidana-polda',
            'command.tindak-pidana-polda',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('tindak-pidana-polda.php');

        $this->mergeConfigFrom($packageConfigPath, 'tindak-pidana-polda');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'tindak-pidana-polda-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'tindak-pidana-polda');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/tindak-pidana-polda'),
        ], 'tindak-pidana-polda-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'tindak-pidana-polda');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/tindak-pidana-polda'),
        ], 'tindak-pidana-polda-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'tindak-pidana-polda-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'tindak-pidana-polda-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'tindak-pidana-polda-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'tindak-pidana-polda-seeds');
    }
}
