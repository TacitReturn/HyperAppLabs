<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{

    /**
     * Runs php artisan migrate:fresh on database
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function migrateDatabase(Request $request): RedirectResponse
    {
        Artisan::call("migrate:refresh");

        Artisan::call("db:seed --class=UserSeeder");

        $user = User::where("email", "glenn@hyperapplabs.com")->first();

        Auth::login($user);

        $request->session()->flash("status", "Database migrate:refresh ran successfully.");

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     *
     * Display the view to create a new user.
     */
    public function createUser()
    {
        return view("admin.create-user");
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * Creates a new user.
     */
    public function storeUser(Request $request)
    {
        if (\request()->hasFile("avatar")) {
            $request["avatar"] = \request()->file("avatar")->store("users/images/avatars/");
        }

        User::create([
            "name" => $request["name"],
            "role" => $request["role"],
            "avatar" => $request["avatar"],
            "email" => $request["email"],
            "password" => Hash::make($request["password"]),
        ]);

        return view("home");
    }

    public function deployCode()
    {
        Http::get("https://forge.laravel.com/servers/581193/sites/1716665/deploy/http?token=qIJV447YgI9h8yGwpM5m38tiwk8SbQ2UcWVQ4zhQ");

        \request()->session()->flash("status", "Code deployed to server successfully.");

        return view("home");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
