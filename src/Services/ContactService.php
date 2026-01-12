<?php

namespace Deesynertz\ContactService\Services;

use Illuminate\Support\Facades\Mail;
use Deesynertz\ContactService\Mail\ContactFormMail;

class ContactService
{
    /**
     * Send contact form data to management.
     *
     * @param array $data ['name', 'email', 'phone', 'message']
     */
    public function send(array $data): void
    {
        Mail::send(new ContactFormMail($data));
    }
}

