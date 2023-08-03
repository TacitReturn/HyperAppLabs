<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * Return a single resource
     *
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        views($post)
            ->cooldown(now()->addMinutes(30))
            ->record();

        $viewsCount = views($post)->count();
        return view('blog.show', ["post" => $post, "viewsCount" => $viewsCount]);
    }
}
