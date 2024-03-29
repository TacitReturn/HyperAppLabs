<?php

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMailable;
use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::post('contact', function (ContactFormRequest $request) {
    $user = User::find(1);

    $validatedData = $request->validated();

    if ($validatedData) {
        $contactForm = ContactForm::create($validatedData);

        // Mail::to($user->email)->send(new ContactMailable($contactForm));

        $request->session()->flash('success', "Thank you for your interest in doing busines {$contactForm->name}. We will reach back out to you as soon as possible aobut your inquiry.");

        return response()->json(['message' => 'Success']);
    } else {
        return response()->json(['message' => 'Error'])->with();
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
