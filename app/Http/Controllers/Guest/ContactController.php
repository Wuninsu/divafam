<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            ->image(default: fn() => asset('images/contact-us-banner.jpg'))
            ->flipp('contact', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.contact-us');
    }
}
