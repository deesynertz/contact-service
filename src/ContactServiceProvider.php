<?php

namespace Deesynertz\ContactService;

use Illuminate\Support\ServiceProvider;
use Deesynertz\ContactService\ContactService;

class ContactServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/deesynertz-contact.php',
            'deesynertz-contact'
        );

        $this->app->singleton(ContactService::class, function ($app) {
            return new ContactService();
        });
    }

    public function boot()
    {
         $this->publishes([
            __DIR__.'/../config/deesynertz-contact.php' => config_path('deesynertz-contact.php'),
        ], 'deesynertz-contact-config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'deesynertz-contact');
    }
}
