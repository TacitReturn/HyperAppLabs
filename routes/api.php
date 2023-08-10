<?php

use App\Mail\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ContactFormRequest;

Route::post('contact', function (ContactFormRequest $request) {
    $user = User::find(1);

    $validatedData = $request->validated();

    $contactForm = Contact::create($validatedData);

    Mail::to($user->email)->send(new Contact($contactForm));

    return response()->json(["success" => "Thank you for your interest in doing busines {$contactForm->name}. We will reach back out to you as soon as possible aobut your inquiry."]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
