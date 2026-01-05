<?php

namespace Deesynertz\ContactService\Tests\Feature;

use Deesynertz\ContactService\Mail\ContactMail;
use Deesynertz\ContactService\Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class ContactServiceTest extends TestCase
{
    /**
     * Test that the contact route exists and returns a redirect
     */
    public function test_contact_route_exists()
    {
        $response = $this->post(config('deesynertz-contact.route'), [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
    }

    /**
     * Test validation errors are returned when required fields are missing
     */
    public function test_contact_validation()
    {
        $response = $this->post(config('deesynertz-contact.route'), []);

        $response->assertSessionHasErrors(['name', 'email', 'phone']);
    }

    /**
     * Test that email is sent with correct data
     */
    public function test_email_is_sent()
    {
        Mail::fake();

        $payload = [
            'name'  => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '0987654321',
        ];

        $this->post(config('deesynertz-contact.route'), $payload);

        Mail::assertSent(ContactMail::class, function ($mail) use ($payload) {
            return $mail->data['name'] === $payload['name'] &&
                   $mail->data['email'] === $payload['email'] &&
                   $mail->data['phone'] === $payload['phone'];
        });
    }
}
