<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

public function submit(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    // Send mail or store message
    // Example: Mail::to('you@example.com')->send(new ContactMail($validated));

    return response()->json(['message' => 'Message sent successfully!']);
}


class ContactController extends Controller
{
    //
}
