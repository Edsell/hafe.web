<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use App\Models\GeneralSettings;

class ContactController extends Controller
{
    public function show(Request $request)
    {
        // Generate a simple math CAPTCHA and store the answer in session
        $a = random_int(2, 9);
        $b = random_int(1, 9);
        $request->session()->put('captcha_answer', $a + $b);

        // Standard page data for your pgBg layout
        $data = [
            'Page'  => 'pages.contact',
            'Title' => 'Contact',
            'Desc'  => 'Get in touch',
            // pass captcha numbers to the view
            'captchaA' => $a,
            'captchaB' => $b,
        ];

        return view('pgBg', $data);
    }

    public function submit(Request $request)
    {
        // Honeypot: invisible input must stay empty
        if ($request->filled('website')) {
            return back()->withInput()->withErrors([
                'name' => 'Unexpected validation error. Please try again.',
            ]);
        }

        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:190'],
            'phone'   => ['required', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:120', 'not_in:Select Subject'],
            'message' => ['required', 'string', 'max:5000'],
            'captcha' => ['required', 'numeric'],
            'agree'   => ['nullable', 'accepted'], // optional checkbox
        ], [
            'subject.not_in' => 'Please choose a subject.',
        ]);

        // Validate CAPTCHA
        $expected = (int) $request->session()->get('captcha_answer', -1);
        if ((int)$validated['captcha'] !== $expected) {
            return back()->withInput()->withErrors(['captcha' => 'CAPTCHA answer is incorrect.']);
        }

        // Determine recipient — prefer DB general_settings.Email, fallback to .env
        $to = 'hafeschool@gmail.com';

        // Send the email
        Mail::to($to)->send(new ContactMessageMail($validated));

        // Invalidate captcha answer so it can’t be reused
        $request->session()->forget('captcha_answer');

        return redirect()->route('ContactPage')
            ->with('contact_success', 'Thanks! Your message has been sent successfully.');
    }
}
