<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// TODO: Create an event and listiner for the contact form, have it sent to the admin when the contact form is filled out.
// TODO: Create functionality for users to unsibscribe from email list.

Auth::routes();

Route::get('services', [PageController::class, 'services'])->name('page.service');

Route::resource('emails', EmailController::class);

Route::get('/', [WelcomeController::class, 'index'])->name('blog.index');

Route::get('blog/posts/{post}', [\App\Http\Controllers\Blog\PostController::class, 'show'])->name('blog-post.show');

Route::post('comments/{post}', [CommentController::class, 'store'])->name('comments.store');

Route::delete('comments/comment', [CommentController::class, 'destroy'])->name('comments.destroy');

//Route::get('contact', [ContactUsFormController::class, 'createForm'])->name('contact.create');

Route::post('contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

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

    Route::get('messages', function () {
        dd('All messages');
    })->name('messages.index');

    Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
});

/**
 * Product Routes
 */
Route::resource('products', ProductController::class);
