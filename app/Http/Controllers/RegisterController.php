<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register.create', []);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
