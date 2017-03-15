<?php

namespace Min\FractalCommands;

use Illuminate\Support\ServiceProvider;
use Min\FractalCommands\Commands\FractalInit;
use Min\FractalCommands\Commands\FractalTranformer;

class FractalComamndsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * * @return void
     */
    public function boot()
    {
        $this->commands(['commands.fractal.init', 'commands.tranformer.create']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }

    private function registerCommands(){
        $this->app->singleton('commands.fractal.init', function($app){
            return new FractalInit();
        });

        $this->app->singleton('commands.tranformer.create', function($app){
            return new FractalTranformer();
        });
    }
}
