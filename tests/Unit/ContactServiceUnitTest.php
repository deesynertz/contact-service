<?php

namespace Deesynertz\ContactService\Tests\Unit;

use Deesynertz\ContactService\ContactService;
use Deesynertz\ContactService\Mail\ContactMail;
use Deesynertz\ContactService\Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class ContactServiceUnitTest extends TestCase
{
    protected ContactService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ContactService();
    }

    /**
     * Test that ContactService sends an email
     */
    public function test_contact_service_sends_email()
    {
        Mail::fake();

        $data = [
            'name'  => 'Alice',
            'email' => 'alice@example.com',
            'phone' => '123456789',
        ];

        $this->service->send($data);

        Mail::assertSent(ContactMail::class, function ($mail) use ($data) {
            return $mail->data['name'] === $data['name'] &&
                   $mail->data['email'] === $data['email'] &&
                   $mail->data['phone'] === $data['phone'];
        });
    }
}
