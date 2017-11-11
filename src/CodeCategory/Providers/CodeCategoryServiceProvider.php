<?php

namespace CodePress\CodeCategory\Providers;


use Illuminate\Support\ServiceProvider;

class CodeCategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../resources/migrations');

        $this->publishes(
            [__DIR__ . '/../../resources/migrations' => base_path('databases/migrations')],
            'migrations'
        );
    }

    public function register()
    {

    }

}