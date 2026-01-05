<?php

namespace Deesynertz\ContactService;

use Deesynertz\ContactService\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function send(array $data): void
    {
        Mail::to(config('deesynertz-contact.to'))
            ->send(new ContactMail($data));
    }
}
