<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donate()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Donate to Support Women Empowerment - ' . config('app.name', 'DivaFam'))
            ->description('Join us in empowering women and communities. Your donation helps support programs, projects, and initiatives that make a real difference.')
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->twitterSite('@divafam');

        return view('guest.donations.donate');
    }


    public function donors()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Our Donors - ' . config('app.name', 'DivaFam'))
            ->description('We are grateful to our donors who support DivaFam’s mission to empower women and strengthen communities. See the amazing people and organizations behind our work.')
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->twitterSite('@divafam');

        return view('guest.donations.donors');
    }

}
