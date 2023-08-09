<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('contact', function (Request $request) {
    return response()->json(['message' => $request->all()]);
})->middleware('auth');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
