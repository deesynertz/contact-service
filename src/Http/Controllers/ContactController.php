<?php

namespace Deesynertz\ContactService\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Deesynertz\ContactService\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $payload = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:30',
        ]);

        Mail::to(config('deesynertz-contact.to'))->send(new ContactMail($payload));

        return back()->with('success', 'Message sent successfully.');
    }
}
