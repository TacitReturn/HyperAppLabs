<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Http\Request;

class DeletePost
{
    public function handle(Request $request, $id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            $post->tags()->sync([]);

            $post->deleteImage();

            $post->forceDelete();
        } else {
            $post->delete();
        }
    }
}