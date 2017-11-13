<?php

namespace CodePress\CodeCategory\Tests;

use CodePress\CodeCategory\Providers\CodeCategoryServiceProvider;
use Cviebrock\EloquentSluggable\ServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{

    public function migrate()
    {
        $this->artisan('migrate', ['--database' => 'testbench']);
    }

    public function getPackageProviders($app)
    {
        return [
            CodeCategoryServiceProvider::class,
            ServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

}