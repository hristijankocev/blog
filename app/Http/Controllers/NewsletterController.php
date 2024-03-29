<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function subscribe(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        try {
            $newsletter->subscribe($request['email']);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter.'
            ]);
        }

        return redirect('/')->with('success', 'Subscribed successfully for our newsletter!');
    }
}
