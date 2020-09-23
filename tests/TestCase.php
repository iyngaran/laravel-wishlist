<?php


namespace Iyngaran\LaravelWishlist\Tests;


use Iyngaran\LaravelWishlist\LaravelWishlistServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase();
    }

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LaravelWishlistServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('database.default', 'testdb');
        $app['config']->set(
            'database.connections.testdb',
            [
                'driver' => 'sqlite',
                'database' => ':memory:'
            ]
        );
        $app['config']->set('mail.driver', 'log');
    }


    private function setUpDatabase(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/resources/database/migrations');
    }
}
