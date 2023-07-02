<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostService
{
    public function createPost(array $postData): Post
    {
        return Post::create(
            [
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title'], '-'),
                'description' => $postData['description'],
                'content' => $postData['content'],
                'image' => $postData["image"],
                'video' => $postData["video"],
                'published_at' => $postData['published_at'],
                'category_id' => $postData['category'],
                'user_id' => auth()->user()->id,
            ]
        );

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return $post;
    }

    public function uploadVideo(Request $request): ?string
    {
        return ($request->hasFile("video"))
            ? $request->file('video')->store('posts/videos')
            : null;
    }

    public function uploadImage(Request $request): ?string
    {
        return ($request->hasFile("image"))
            ? $request->file('image')->store('posts/images')
            : null;
    }
}