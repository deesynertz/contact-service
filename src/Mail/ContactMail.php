<?php

namespace Deesynertz\ContactService\Mail;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public function __construct(public array $data) {}

    public function build()
    {
        return $this->subject(config('deesynertz-contact.subject'))
            ->replyTo($this->data['email'], $this->data['name'])
            ->view('deesynertz-contact::email', $this->data);
    }
}
