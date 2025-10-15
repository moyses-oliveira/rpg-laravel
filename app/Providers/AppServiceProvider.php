<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->registerModulesCommands();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }


    public function registerModulesCommands():void
    {
        $commandFiles = glob(base_path('modules/*/Commands/*.php'));

        foreach ($commandFiles as $commandFile) {
            $commandClass = 'Modules\\' . str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    substr($commandFile, strpos($commandFile, 'modules/') + 8)
                );

            if (class_exists($commandClass)) {
                $this->commands([$commandClass]);
            }
        }

// To generate an SSH key for GitHub authentication with the name "rpg-laravel", you can use the following command:
// ssh-keygen -t rsa -b 4096 -C "contato@moysesoliveira.com.br" -f ~/.ssh/rpg-laravel
    }
}
