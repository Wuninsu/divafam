<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Testimonials - ' . config('app.name', 'DivaFam'))
            ->description('Read inspiring testimonials from women and youth whose lives have been positively impacted by DivaFam’s empowerment programs and community support.')
            ->keywords('testimonials, women empowerment stories, community impact, youth success, DivaFam experiences')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('testimonials', 'your_flipp_id_here')
            ->twitterSite('@divafam');
        $testimonies = Inquiry::where('type','=','testimony')->where('status', true)->latest()->get();
        return view('guest.testimonials',compact('testimonies'));
    }
}
