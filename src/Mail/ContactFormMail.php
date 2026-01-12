<?php

namespace Deesynertz\ContactService\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public function __construct(public array $data)
    {
    }

    public function build()
    {
        return $this
            ->from(
                config('deesynertz-contact.from.address'),
                config('deesynertz-contact.from.name')
            )
            ->to(config('deesynertz-contact.to'))
            ->subject('New Contact Form Submission')
            ->view('deesynertz-contact::emails.contact-form');
    }
}
