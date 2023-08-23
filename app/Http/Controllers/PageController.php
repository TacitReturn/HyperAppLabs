<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function services()
    {
        return view('pages.service');
    }

    public function features(Request $request)
    {
        return view("pages.features");
    }

    public function contact(Request $request)
    {
        return view("pages.contact");
    }
}
