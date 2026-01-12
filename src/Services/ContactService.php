<?php

namespace Deesynertz\ContactService\Services;

use Illuminate\Support\Facades\Mail;
use Deesynertz\ContactService\Mail\ContactFormMail;
use RuntimeException;

class ContactService
{
    /**
     * Send contact form data to management.
     *
     * @param array $data ['name', 'email', 'phone', 'message']
     */
    public function send(array $data): void
    {
        // Validate required config before sending
        $this->validateConfig();

        Mail::send(new ContactFormMail($data));
    }

    /**
     * Validate that required env/config variables are set.
     *
     * @throws RuntimeException
     */
    protected function validateConfig(): void
    {
        if (!config('deesynertz-contact.from.address')) {
            throw new RuntimeException(
                'MAIL_FROM_ADDRESS is not set in your .env'
            );
        }

        if (!config('deesynertz-contact.to')) {
            throw new RuntimeException(
                'MAIL_TO_ADDRESS is not set in your .env'
            );
        }
    }
}
