<?php

namespace Jazer\Forms\Http\Provider;

use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/database.php', 'forms'  
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../../config/config.php' => config_path('jtformsconfig.php')
        ], 'jtformsconfig-config');
        
        $this->loadRoutesFrom( __DIR__ . '/../../../routes/api.php');

        config(['database.connections.conn_forms' => config('forms.database_connection')]);
    }
}
