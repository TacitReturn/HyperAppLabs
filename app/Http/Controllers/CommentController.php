<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use App\Http\Requests\Comments\StoreCommentRequest;
    use App\Models\Post;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class CommentController extends Controller
    {
        public function publishComment(Request $request, Comment $comment)
        {
            $comment->update(["isPublished" => true]);

            $request->session()->flash("status", "Comment published successfully.");

            return redirect()->route("comments.index");
        }

        public function unPublishComment(Request $request, Comment $comment)
        {
            $comment->update(["isPublished" => false]);

            $request->session()->flash("status", "Comment un-published successfully.");

            return redirect()->route("comments.index");
        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            return view("comments.index", ["comments" => Comment::all()]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return void
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @return RedirectResponse
         */
        public function store(StoreCommentRequest $request, Post $post): RedirectResponse
        {
            $vadlidatedData = $request->validated();

            $vadlidatedData["post_id"] = $post->id;

            Comment::create($vadlidatedData);

            return redirect()->back();
        }

        /**
         * Display the specified resource.
         *
         * @param  Comment  $comment
         * @return Response
         */
        public function show(Comment $comment)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Comment  $comment
         * @return void
         */
        public function edit(Comment $comment)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \App\Http\Requests\UpdateCommentRequest  $request
         * @param  Comment  $comment
         * @return void
         */
        public function update(UpdateCommentRequest $request, Comment $comment)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Comment  $comment
         * @return RedirectResponse
         */
        public function destroy(Comment $comment): RedirectResponse
        {
            $comment->delete();

            \request()->session()->flash("status", "Comment deleted successfully..");

            return redirect()->route("comments.index");
        }
    }
