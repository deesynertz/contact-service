<?php

namespace Deesynertz\ContactService\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Deesynertz\ContactService\ContactServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Load the package service provider
     */
    protected function getPackageProviders($app)
    {
        return [
            ContactServiceProvider::class,
        ];
    }

    /**
     * Set up environment config for tests
     */
    protected function getEnvironmentSetUp($app)
    {
        // Set default .env config for testing
        $app['config']->set('deesynertz-contact.from.address', 'booktour@test.com');
        $app['config']->set('deesynertz-contact.from.name', 'Test Sender');
        $app['config']->set('deesynertz-contact.to', 'management@test.com');
    }
}
