<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("users.index", ["users" => User::all()]);
    }

    /**
     * @param  User  $user
     * @return RedirectResponse
     */
    public function makeAdmin(User $user): RedirectResponse
    {
        $user->makeAdmin();

        request()->session()->flash("status", "{$user->name} as been made an admin");

        return redirect()->route("users.index");
    }

    /**
     * @param  User  $user
     * @return RedirectResponse
     */
    public function makeWriter(User $user): RedirectResponse
    {
        $user->makeWriter();

        request()->session()->flash("status", "{$user->name} as been made an writer");

        return redirect()->route("users.index");
    }
    /**
     * Display a view to edit the resource
     * @return Application|Factory|View
     */
    public function edit()
    {
        return view("users.edit", ["user" => auth()->user()]);
    }

    public function update()
    {
        $user = auth()->user();

        $user->name = request()->input("name");
        $user->about = request()->input("about");
        $user->save();
        request()->session()->flash("status", "You've updated your profile successfully.");

        return redirect()->back();
    }
}
