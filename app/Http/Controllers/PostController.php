<?php

namespace App\Http\Controllers;

use App\Actions\CreateNewPost;
use App\Actions\UpdatePost;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view(
            'posts.create',
            [
                'categories' => Category::all(),
                'tags' => Tag::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, CreateNewPost $createNewPost): RedirectResponse
    {
        $post = $createNewPost->handle($request);

        $request->session()->flash('status', "Post '{$post->title}' created successfully");

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('posts.create', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, UpdatePost $updatePost, Post $post): RedirectResponse
    {
        $updatePost->handle($request, $post);

//        $validatedData = $request->validated();
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image')->store('posts/images');
//
//            $video = $request->file('video')->store('posts/videos');
//
//            $post->deleteImage();
//
//            $validatedData['image'] = $image;
//
//            $validatedData['video'] = $video;
//        }
//
//        if ($request->tags) {
//            $post->tags()->syncWithoutDetaching($request->tags);
//        }
//
//        $post->category_id = $request->input('category');
//
//        $post->update($validatedData);

        $request->session()->flash('status', 'Post updated successfully..');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            $post->tags()->sync([]);

            $post->deleteImage();

            $post->forceDelete();
        } else {
            $post->delete();
        }

        request()->session()->flash('status', 'Post deleted successfully..');

        return redirect()->route('posts.index');
    }
    public function deleteAllDestroyed()
    {
        $deletedPosts = Post::onlyTrashed()->get();

        $deletedPosts->each(function ($deletedPost) {
            $deletedPost->tags()->sync([]);

            $deletedPost->deleteImage();

            $deletedPost->forceDelete();
        });
    }

    /**
     * Display a list of all trashed posts.
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Restore the given post
     */
    public function restorePost($id): RedirectResponse
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        request()->session()->flash('status', 'Post restored successfully..');

        return redirect()->back();
    }
}
