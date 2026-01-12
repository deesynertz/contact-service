<?php

namespace Deesynertz\ContactService\Http\Controllers;

use Deesynertz\ContactService\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $payload = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:30',
        ]);

        Mail::to(config('deesynertz-contact.to'))->send(new ContactFormMail($payload));

        return back()->with('success', 'Message sent successfully.');
    }
}
