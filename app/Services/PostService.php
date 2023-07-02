<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostService
{
    public function createPost(Request $request): Post
    {
        $validatedData = $request->validated();

        $image = $request->file('image')->store('posts/images');

        if ($request->hasFile('video'))
        {
            $validatedData["video"] = $video = $request->file('video')->store('posts/videos');
        }

        $post = Post::create(
            [
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title'], '-'),
                'description' => $validatedData['description'],
                'content' => $validatedData['content'],
                'image' => $image,
                'video' => $video,
                'published_at' => $validatedData['published_at'],
                'category_id' => $validatedData['category'],
                'user_id' => auth()->user()->id,
            ]
        );

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return $post;
    }
}