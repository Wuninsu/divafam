<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Privacy Policy - ' . config('app.name', 'DivaFam'))
            ->description('Read DivaFam’s Privacy Policy to understand how we collect, protect, and use your personal data to provide a safe and transparent experience on our platform.')
            ->keywords('privacy policy, data protection, personal information, security, privacy rights, DivaFam data handling')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('privacy', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.privacy');
    }
}
