<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::post('contact', function (Request $request) {

    $formData = $request->all();

    $formData["budget"];

    return response()->json(['message' => $formData["budget"]]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
