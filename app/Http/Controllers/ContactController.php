<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Mail::raw(
            "Name: {$validated['name']}\nEmail: {$validated['email']}\nSubject: {$validated['subject']}\n\n{$validated['message']}",
            function ($mail) use ($validated) {
                $mail->to('rishan-tk@rishan.dev')
                     ->replyTo($validated['email'], $validated['name'])
                     ->subject("Contact Form: {$validated['subject']}");
            }
        );

        return response()->json(['message' => 'Message sent successfully!']);
    }
}
