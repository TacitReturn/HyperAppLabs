<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application ;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Return a single resource
     *
     * @return Application|Factory|View
     */
    public function index(Post $post)
    {
        return view("blog.show", ["post" => $post]);
    }

    public function show(Post $post)
    {
        return view("blog.show", ["post" => $post]);
    }
}
