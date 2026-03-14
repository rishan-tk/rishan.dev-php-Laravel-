<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        if ($request->filled('website')) {
            return response()->json(['message' => 'Message sent successfully!']);
        }

        $validated = $request->validated();
        $validated = array_map(fn ($v) => strip_tags($v), $validated);

        foreach (['name', 'email', 'subject'] as $field) {
            $validated[$field] = str_replace(["\r", "\n"], '', $validated[$field]);
        }

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
