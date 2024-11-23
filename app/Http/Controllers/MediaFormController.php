<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MediaFormController extends Controller
{
    public function showForm()
    {
        // Render the form view
        return view('media_form'); // Create this view in the next step
    }

    public function handleForm(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'media' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);

        // Store uploaded media file securely in storage/public/uploads
        $filePath = $request->file('media')->store('uploads', 'public');

        // Prepare email data
        $emailData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'user_message' => $validated['message'],
        ];

        // Send email with the file attached
        Mail::send('emails.form_submission', $emailData, function ($message) use ($validated, $filePath) {
            $message->to('it20640798@my.sliit.lk') // Replace with your email address
                ->subject('New Form Submission')
                ->attach(storage_path('app/public/' . $filePath));
        });

        return back()->with('success', 'Form submitted successfully!');
    }
}
