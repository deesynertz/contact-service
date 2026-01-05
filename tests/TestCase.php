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
        $app['config']->set('mail.default', 'array');
        $app['config']->set('deesynertz-contact.to', 'test@example.com');
        $app['config']->set('deesynertz-contact.route', '/contact/send');
    }
}
