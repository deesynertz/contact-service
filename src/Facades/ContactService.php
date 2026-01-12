<?php

namespace Deesynertz\ContactService\Facades;

use Illuminate\Support\Facades\Facade;

class ContactService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Deesynertz\ContactService\Services\ContactService::class;
    }
}
