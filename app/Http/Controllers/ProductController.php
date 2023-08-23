<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        // Check to see if there's an image in the request
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products/images');
            $product = Product::create(
                [
                    'title' => $validatedData['title'],
                    'slug' => Str::slug($validatedData['title'], '-'),
                    'description' => $validatedData['description'],
                    'content' => $validatedData['content'],
                    'image' => $image,
                    'published_at' => $validatedData['published_at'],
                    'category_id' => $validatedData['category'],
                    'user_id' => auth()->user()->id,
                ]
            );
            // Check to see if there's tags in the request
            if ($request->has('tags')) {
                $product->tags()->attach($request->tags);
            }
        }

        $request->session()->flash('status', "Product '{$product->title}' created successfully");

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return 'Show Product Lorem ipsum dolar amet';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return 'Edit Product';
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        return 'Update Product';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return 'Destroy Product';
    }
}
