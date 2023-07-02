<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Http\Request;

class CreateNewPost
{
    public function handle(Request  $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts/images');

            $video = $request->file('video')->store('posts/videos');

            return Post::create(
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
        }
    }
}