<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class UpdatePost
{
    public function handle(Request $request, Post $post): void
    {
        $validatedData = $request->validated();

        $image = $request->hasFile("image")
            ? $request->file("image")->store("posts/images")
            : null;

        $video = $request->hasFile("video")
            ? $request->file("video")->store("posts/videos")
            : null;

            $post->deleteImage();

            $validatedData['image'] = $image;

            $validatedData['video'] = $video;

        if ($request->tags) {
            $post->tags()->syncWithoutDetaching($request->tags);
        }

        $post->category_id = $request->input('category');

        $post->update($validatedData);
    }
}