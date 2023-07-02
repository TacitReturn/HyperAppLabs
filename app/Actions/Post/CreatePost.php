<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreatePost
{
    public function handle(Request $request): Post
    {
        $validatedData = $request->validated();

        $image = $request->hasFile("image")
            ? $request->file("image")->store("posts/images")
            : null;

        $video = $request->hasFile("video")
            ? $request->file("video")->store("posts/videos")
            : null;

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

//        TODO:// Create an event, for the newly created post.
        return $post;
    }
}