<?php

namespace App\Actions\Post;

use App\Models\Post;

class DeleteAllTrashed
{
    public function handle(): void
    {
        $deletedPosts = Post::onlyTrashed()->get();

        $deletedPosts->each(function ($deletedPost) {
            $deletedPost->tags()->sync([]);

            $deletedPost->deleteImage();

            $deletedPost->forceDelete();
        });
    }
}
