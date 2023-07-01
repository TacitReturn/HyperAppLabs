<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Str;

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
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $video = $request->file('video', null)->store('posts/videos');

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts/images');

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
        }

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
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts/images');

            $post->deleteImage();

            $validatedData['image'] = $image;
        }

        if ($request->tags) {
            $post->tags()->syncWithoutDetaching($request->tags);
        }

        $post->category_id = $request->input('category');

        $post->update($validatedData);

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
