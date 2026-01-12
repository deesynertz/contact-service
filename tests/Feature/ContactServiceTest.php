<?php

namespace Deesynertz\ContactService\Tests\Feature;

use Deesynertz\ContactService\Facades\ContactService;
use Deesynertz\ContactService\Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Deesynertz\ContactService\Mail\ContactFormMail;
use Illuminate\Http\Request;

class ContactServiceTest extends TestCase
{
    /** @test */
    public function it_can_send_email_from_a_controller_like_request()
    {
        Mail::fake();

        $requestData = [
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'phone' => '5551234',
            'message' => 'Feature test message'
        ];

        // Simulate what a controller would do
        $request = new Request($requestData);
        $data = $request->only(['name', 'email', 'phone', 'message']);
        ContactService::send($data);

        Mail::assertSent(ContactFormMail::class, function ($mail) use ($requestData) {
            return $mail->data['name'] === $requestData['name'] &&
                   $mail->data['email'] === $requestData['email'];
        });
    }
}
