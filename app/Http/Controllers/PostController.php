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

    class PostController extends Controller
    {
        public function __construct()
        {
            $this->middleware("verifyCategoryCount")->only(["create", "store"]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            $posts = Post::orderBy("created_at", "DESC")->get();

            return view("posts.index", ["posts" => $posts]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create()
        {
            return view("posts.create",
                        [
                            "categories" => Category::all(),
                            "tags" => Tag::all()
                        ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StorePostRequest  $request
         * @return RedirectResponse
         */
        public function store(StorePostRequest $request): RedirectResponse
        {

            $validatedData = $request->validated();

            // Check to see if there's an image in the request
            if ($request->hasFile("image")) {
                $image = $request->file("image")->store("posts/images");
                $post = Post::create(
                    [
                        "title" => $validatedData["title"],
                        "description" => $validatedData["description"],
                        "content" => $validatedData["content"],
                        "image" => $image,
                        "published_at" => $validatedData["published_at"],
                        "category_id" => $validatedData["category"],
                        "user_id" => auth()->user()->id,
                    ]
                );
                // Check to see if there's tags in the request
                if ($request->has("tags")) {
                    $post->tags()->attach($request->tags);
                }
            }

            $request->session()->flash("status", "Post '{$post->title}' created successfully");

            return redirect()->route("posts.index");
        }

        /**
         * Display the specified resource.
         *
         * @param  Post  $post
         * @return Response
         */
        public function show(Post $post)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Post  $post
         * @return Application|Factory|View
         */
        public function edit(Post $post)
        {
            return view("posts.create", [
                "post" => $post,
                "categories" => Category::all(),
                "tags" => Tag::all(),
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  UpdatePostRequest  $request
         * @param  Post  $post
         * @return RedirectResponse
         */
        public function update(UpdatePostRequest $request, Post $post): RedirectResponse
        {
            $validatedData = $request->validated();

            // Check if new image
            if ($request->hasFile("image")) {
                // Upload it
                $image = $request->file("image")->store("posts/images");

                // Delete old one
                $post->deleteImage();

                $validatedData["image"] = $image;
            }

            if ($request->tags) {
                $post->tags()->syncWithoutDetaching($request->tags);
            }

            $post->category_id = $request->input("category");

            $post->update($validatedData);

            // Flash message
            $request->session()->flash("status", "Post updated successfully..");

            // Redirect user
            return redirect()->route("posts.index");
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param $id
         * @return RedirectResponse
         */
        public function destroy($id): RedirectResponse
        {
            $post = Post::withTrashed()->where("id", $id)->firstOrFail();

            if ($post->trashed()) {
                $post->deleteImage();

                $post->forceDelete();
            } else {
                $post->delete();
            }

            request()->session()->flash("status", "Post deleted successfully..");

            return redirect()->route("posts.index");
        }

        /**
         * Display a list of all trashed posts.
         */
        public function trashed()
        {
            $posts = Post::onlyTrashed()->get();

            return view("posts.index", ["posts" => $posts]);
        }

        /**
         * Restore the given post
         * @param  $id
         * @return RedirectResponse
         */
        public function restorePost($id): RedirectResponse
        {
            $post = Post::withTrashed()->where("id", $id)->firstOrFail();

            $post->restore();

            request()->session()->flash("status", "Post restored successfully..");

            return redirect()->back();
        }
    }
