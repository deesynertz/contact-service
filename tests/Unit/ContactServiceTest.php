<?php

namespace Deesynertz\ContactService\Tests\Unit;

use Deesynertz\ContactService\Facades\ContactService;
use Deesynertz\ContactService\Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Deesynertz\ContactService\Mail\ContactFormMail;

class ContactServiceTest extends TestCase
{/** @test */
    public function it_sends_a_contact_email_via_service()
    {
        Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'message' => 'Hello world'
        ];

        // Call the service directly
        $service = resolve(\Deesynertz\ContactService\Services\ContactService::class);
        $service->send($data);

        Mail::assertSent(ContactFormMail::class, function ($mail) use ($data) {
            return $mail->data['email'] === $data['email'];
        });
    }

    /** @test */
    public function it_sends_email_via_facade()
    {
        Mail::fake();

        $data = [
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'phone' => '987654321',
            'message' => 'Test message'
        ];

        ContactService::send($data);

        Mail::assertSent(ContactFormMail::class, function ($mail) use ($data) {
            return $mail->data['name'] === $data['name'];
        });
    }
}
