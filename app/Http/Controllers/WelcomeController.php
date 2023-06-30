<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::published()->orderBy('created_at', 'DESC')->paginate(4);

        $clientSearch = $request->input('client-search');

        if ($request->has('client-search')) {
            $posts = Post::where('title', 'like', "%{$clientSearch}%")->paginate(4);
        }

        return view('welcome', [
            'posts' => $posts,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'bio' => DB::table('bio')->where('id', 1)->first(),
        ]);
    }
}
