<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('About Us - ' . config('app.name', 'DivaFam'))
            ->description('DivaFam (formerly known as Diva Farms) is a nonprofit organization dedicated to empowering women and youth through sustainable farming, education, and community support.')
            ->keywords('about DivaFam, women empowerment, sustainable farming, nonprofit, youth training, community development, agricultural skills, future-building')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('images/about-us-banner.jpg'))
            ->flipp('about', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.about-us');
    }
}
