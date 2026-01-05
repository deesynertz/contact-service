<?php

use Deesynertz\ContactService\Http\Controllers\ContactController;



Route::post(config('deesynertz-contact.route'),[ContactController::class, 'send'])->name('deesynertz.contact.send');