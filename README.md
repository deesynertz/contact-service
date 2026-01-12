# Deesynertz Contact Service

A **reusable Laravel package** to handle contact form submissions and send emails. Designed to be **plug-and-play**, it allows any Laravel project to receive contact form data and send it to management with minimal setup.

---

## Features

- Send contact form submissions via email
- Configurable sender and recipient addresses via `.env`
- Built-in config validation with clear error messages
- Fully tested with unit and feature tests
- Easy to integrate using a facade or service class

---

## Installation

1. Require the package via Composer:

```bash
composer require deesynertz/contact-service
```

# Deesynertz Contact Service

A reusable Laravel package to handle contact form submissions and send emails.

---

## Installation

Publish the configuration file:

```bash
php artisan vendor:publish --tag=deesynertz-contact-config
```

This will copy the config to: [config/deesynertz-contact.php]


## Configuration

Also ensure Laravel mail settings are properly configured:

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourmail.com
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=sender@yourdomain.com
MAIL_PASSWORD=yourpassword
MAIL_FROM_ADDRESS=sender@yourdomain.com
MAIL_FROM_NAME="Your Company Name"

# In your project .env, add the following: Recipient email (Example management)
MAIL_TO_ADDRESS=receiver@yourdomain.com
```

## Config Validation

The package checks required environment variables before sending emails.

> If missing, it throws a clear exception:
`RuntimeException: DEESYNERTZ_CONTACT_MAIL_FROM is not set in your .env`

This ensures your system never sends emails without proper configuration.

## Usage Options
1. Sending an email from a controller

```php
use Deesynertz\ContactService\Facades\ContactService;

public function submit(Request $request) {
    # you can put validation first (Optional)

    $data = $request->only(['name', 'email', 'phone', 'message']);
    ContactService::send($data);
    return back()->with('success', 'Your message has been sent!');
}
```
2. Sending an email directly via the service

```php
use Deesynertz\ContactService\Services\ContactService;

$service = resolve(ContactService::class);
$service->send([
    'name' => '',
    'email' => '',
    'phone' => '',
    'message' => '',
]);
```

## Quick Start Example: Blade Form

Here’s a minimal contact form you can use:

```blade
<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="text" name="phone" placeholder="Phone Number">
    <textarea name="message" placeholder="Your Message"></textarea>
    <button type="submit">Send</button>
</form>
```
