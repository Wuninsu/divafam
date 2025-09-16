<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Terms of Service - ' . config('app.name', 'DivaFam'))
            ->description('DivaFam’s Terms of Service outline the rules for using our website and services, including donations, community participation, and content guidelines.')
            ->keywords('terms of service, website terms, donation rules, community participation, user guidelines, DivaFam website terms')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('images/terms-of-service-banner.jpg'))
            ->flipp('terms', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.terms');
    }


    public function faq()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Frequently Asked Questions - ' . config('app.name', 'DivaFam'))
            ->description('Find answers to common questions about DivaFam, including how to get involved, donation information, and details on our empowerment programs.')
            ->keywords('DivaFam FAQ, frequently asked questions, donation information, volunteer opportunities, community support, programs')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('images/faq-banner.jpg'))
            ->flipp('faq', 'your_flipp_id_here')
            ->twitterSite('@divafam');

    }
}
