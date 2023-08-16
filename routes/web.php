<?php

use App\Models\User;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;


// TODO: Create functionality for users to unsibscribe from email list.
// TODO: Decide what to do with the ProductController, and how to implement backend premium content.
Route::post('contact', function (Request $request) {
    $user = User::find(1);

    $validatedData = $request->validate([
        'name' => 'required|string|min:3|max:30',
        'email' => 'email:rfc,dns',
        'company' => 'required|string|min:3|max:30',
        'budget' => 'required',
        'message' => 'required|string|min:3|max:255',
    ]);

    $contactForm = ContactForm::create($validatedData);

    // Mail::to($user->email)->send(new ContactMailable($contactForm));

    $request->session()->flash("success", "Thank you for your interest in doing busines {$contactForm->name}. We will reach back out to you as soon as possible aobut your inquiry.");

    return response()->json(["message" => $request->all()]);
});

Auth::routes();

Route::get('services', [PageController::class, 'services'])->name('page.service');

Route::resource('emails', EmailController::class);

Route::get('/', [WelcomeController::class, 'index'])->name('blog.index');

Route::get('blog/posts/{post}', [\App\Http\Controllers\Blog\PostController::class, 'show'])->name('blog-post.show');

Route::post('comments/{post}', [CommentController::class, 'store'])->name('comments.store');

Route::delete('comments/comment', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

    Route::resource('categories', CategoriesController::class);

    Route::delete('delete-all-destroyed', [PostController::class, 'deleteAllDestroyed'])->name(
        'posts.deleteAllDestroyed'
    );

    Route::resource('posts', PostController::class);

    Route::resource('tags', TagController::class);

    Route::get('trashed-posts', [PostController::class, 'trashed'])->name(
        'trashed-posts.index'
    );

    Route::put('restore-post/{post}', [PostController::class, 'restorePost'])->name(
        'restore-posts'
    );
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('users/profile/{user}', [UserController::class, 'edit'])->name('users.profile');

    Route::put('users/profile', [UserController::class, 'update'])->name('users.update-profile');

    Route::post('users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');

    Route::post('users/{user}/make-writer', [UserController::class, 'makeWriter'])->name('users.make-writer');

    Route::get('admin/create-user', [AdminController::class, 'createUser'])->name('admin.create-user');

    Route::get('admin/create-user', [AdminController::class, 'createUser'])->name('admin.create-user');

    Route::post('admin/create-user', [AdminController::class, 'storeUser'])->name('admin.store-user');

    Route::get('admin/deploy-code', [AdminController::class, 'deployCode'])->name('admin.deploy-code');

    // Comments Index
    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');

    //        // Comments publish
    Route::put('comments/{comment}', [CommentController::class, 'publishComment'])->name('comments.publish');

    Route::put('comments/unpublish/{comment}', [CommentController::class, 'unPublishComment'])->name(
        'comments.unpublish'
    );

    // TODO:// Implement messages route
    Route::get('messages', function () {
        dd('All messages');
    })->name('messages.index');

    Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
});

/**
 * Product Routes
 */
Route::resource('products', ProductController::class);
