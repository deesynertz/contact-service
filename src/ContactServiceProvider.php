<?php

namespace Deesynertz\ContactService;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register package services and configuration.
     */
    public function register(): void
    {
        // Merge package config with the app config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/deesynertz-contact.php', // <- correct path
            'deesynertz-contact'
        );
    }

    /**
     * Bootstrap package services: routes, views, and publishing.
     */
    public function boot(): void
    {
        // Load package routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load views (so they can be used even if not published)
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'deesynertz-contact');
        

        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/deesynertz-contact.php' => config_path('deesynertz-contact.php'),
        ], 'deesynertz-contact-config');
        

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/deesynertz-contact'),
        ], 'deesynertz-contact-views');
    }
}
