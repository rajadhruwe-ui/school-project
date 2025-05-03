<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function publicIndex()
    {
        return view('contact');
    }
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);
        Contact::create($validated);
        // Process form submission
        return back()->with('success', 'Thank you for contacting us!');
    }
}
