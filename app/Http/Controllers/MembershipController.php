<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMembershipRequest;
use App\Http\Requests\UpdateMembershipRequest;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;

class MembershipController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->to(route("courses.index"));
        }

        return view("members.auth.login");
    }

    public function showRegisterForm()
    {
        return view("members.auth.register");
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required|string|min:3|max:25",
            "email" => "required|email:rfc,dns",
            "password" => "required",
            "password_confirm" => "required|same:password"
        ]);

        $user = User::create($credentials);

        if ($user) {
            Auth::login($user);

            return redirect()->route("members.index");
        }
    }

    public function create()
    {
        //
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
//            "email" => "required|email:rfc,dns",
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route("members.index"));
        }

        return back()->withErrors([
            "email" => "The provided credentials do not match our records.",
        ])->onlyInput("email");
    }

    public function index()
    {
        return view("members.index");
    }

    public function dashboard(Request $request): Response
    {
        return view("members.dashboard");
    }

    public function showProfile(Request $request)
    {
        return view("members.profile");
    }

    public function store(StoreMembershipRequest $request)
    {

    }

    public function show(Membership $membership)
    {
        //
    }

    public function edit(Membership $membership)
    {
        //
    }

    public function update(UpdateMembershipRequest $request, Membership $membership)
    {
        //
    }

    public function destroy(Membership $membership)
    {
        //
    }
}
