<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\StoreTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view("tags.index", ["tags" => Tag::all()]);
    }

    public function create()
    {
        return view("tags.create");
    }

    public function store(StoreTagRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validated();

        $tag = Tag::create($validatedData);

        $request->session()->flash("status", "Tag '{$tag->name}' created successfully..");

        return redirect()->route("tags.index");
    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view("tags.create", ["tag" => $tag]);
    }

    public function update(UpdateTagRequest $request, Tag $tag): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validated();

        $tag->update(["name" => $request->name]);

        $request->session()->flash("status", "Tag '{$tag->name}' updated successfully..");

        return redirect()->route("tags.index");
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $tag = Tag::findOrFail($id);

        if ($tag->posts->count() > 0) {
            request()->session()->flash("error", "Tag can't be deleted, because it's associated with posts.");

            return redirect()->back();
        }

        $tag->delete();

        request()->session()->flash("status", "Tag deleted successfully..");

        return redirect()->route("tags.index");
    }
}
