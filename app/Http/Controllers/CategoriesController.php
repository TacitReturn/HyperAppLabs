<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view("categories.index", ["categories" => Category::all()]);
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::create($validatedData);

        $request->session()->flash("status", "Category '{$category->name}' created successfully..");

        return redirect()->route("categories.index");
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view("categories.create", ["category" => $category]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        $category->update([
            "name" => $request->name
        ]);

        $request->session()->flash("status", "Category '{$category->name}' updated successfully..");

        return redirect()->route("categories.index");
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->posts->count() > 0) {
        request()->session()->flash("error", "This category can't be deleted while it has posts");

        return redirect()->back();
        }

        $category->delete();

        request()->session()->flash("status", "Category deleted successfully..");

        return redirect()->route("categories.index");
    }
}
