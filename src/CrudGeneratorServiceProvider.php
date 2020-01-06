<?php

namespace sagor110090\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/views/' => base_path('resources/views/'),
        ]);

        if (\App::VERSION() <= '5.2') {
            $this->publishes([
                __DIR__ . '/../publish/css/app.css' => public_path('css/app.css'),
            ]);
        }

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Sagor110090\CrudGenerator\Commands\CrudCommand',
            'Sagor110090\CrudGenerator\Commands\CrudControllerCommand',
            'Sagor110090\CrudGenerator\Commands\CrudModelCommand',
            'Sagor110090\CrudGenerator\Commands\CrudMigrationCommand',
            'Sagor110090\CrudGenerator\Commands\CrudViewCommand',
            'Sagor110090\CrudGenerator\Commands\CrudLangCommand',
            'Sagor110090\CrudGenerator\Commands\CrudApiCommand',
            'Sagor110090\CrudGenerator\Commands\CrudApiControllerCommand'
        );
    }
}
