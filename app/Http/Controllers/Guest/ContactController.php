<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Contact Us - ' . config('app.name', 'DivaFam'))
            ->description('Get in touch with DivaFam! We’d love to hear from you. Whether you want to donate, volunteer, or learn more about our programs, contact us today.')
            ->keywords('contact DivaFam, get in touch, volunteer, donation inquiries, DivaFam contact information')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('contact', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.contact-us');
    }

    // Handle the form submission and send email
    // Handle the form submission and send email
    public function sendContact(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Send the email
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];

        // // Use a closure to pass data to the email view
        // Mail::send('emails.contact', $data, function ($message) {
        //     $message->to('info@divafarms.org')
        //         ->subject('New Contact Form Submission');
        // });

        // Prepare email content
        $emailContent = "New Contact Form Submission\n\n";
        $emailContent .= "Name: " . $validated['name'] . "\n";
        $emailContent .= "Email: " . $validated['email'] . "\n\n";
        $emailContent .= "Message:\n" . $validated['message'];

        // Send the email as plain text
        Mail::raw($emailContent, function ($message) {
            $message->to('info@divafarms.org')  // Change this to your recipient email
                ->subject('New Contact Form Submission');
        });

        // Redirect back with success message
        return redirect('/contact')->with('success', 'Your message has been sent!');
    }
}
