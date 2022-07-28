<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        return view("welcome", [
            "posts" => Post::orderBy("created_at", "DESC")->get(),
            "tags" => Tag::all(),
            "categories" => Category::all(),
            "bio" => DB::table("bio")->where("id", 1)->first(),
        ]);
    }
}
