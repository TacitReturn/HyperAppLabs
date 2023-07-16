<?php

namespace App\Actions\Email;

use App\Models\Email;
use Illuminate\Http\Request;

class CreateEmail
{
    public function handle(Request $request)
    {
        //        $request->whenHas('email', function () use ($request) {
        $validatedData = $request->validated();

        $email = Email::create($validatedData);

        $request->session()->flash('message', "Thank you for joining our email list, we'll let you know when we create a new lesson, or article.");

        return $email;
        //        });
    }
}
