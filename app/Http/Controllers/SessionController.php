<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function make()
    {

    }


    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
