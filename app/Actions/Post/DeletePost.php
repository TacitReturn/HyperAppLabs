<?php

namespace App\Actions\Post;

use App\Models\Post;

class DeletePost
{
    public function handle($id): void
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
