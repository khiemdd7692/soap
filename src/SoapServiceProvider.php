<?php

namespace KhiemDD\Soap;


use Illuminate\Support\ServiceProvider;

class SoapServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /*
    	|--------------------------------------------------------------------------
    	| Set the Package Views Namespace
    	|--------------------------------------------------------------------------
    	*/

        $this->loadViewsFrom(__DIR__.'/Resources/views', 'soap');

        /*
        |--------------------------------------------------------------------------
        | Publish Views and Config
        |--------------------------------------------------------------------------
        */

        $this->publishes([
            __DIR__ . '/Resources/views' => base_path('resources/views/vendor/soap'),
            __DIR__ . '/../config/soap.php' => base_path('config/soap.php')
        ], 'soap');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        /*
    	|--------------------------------------------------------------------------
        | Merge User-Customized Config Values
        |--------------------------------------------------------------------------
        */

        $this->mergeConfigFrom(
            __DIR__ . '/../config/soap.php', 'soap'
        );


        /*
    	|--------------------------------------------------------------------------
    	| Include the Package Routes File.
    	|--------------------------------------------------------------------------
    	*/

        require __DIR__ . '/routes.php';

    }

}
