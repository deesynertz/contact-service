<?php

namespace Deesynertz\ContactService;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/contact.php',
            'deesynertz-contact'
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'deesynertz-contact');

        $this->publishes([
            __DIR__ . '/config/contact.php' => config_path('deesynertz-contact.php'),
        ], 'deesynertz-contact-config');
    }
}
