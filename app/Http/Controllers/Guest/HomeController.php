<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Home - ' . config('app.name', 'DivaFam'))
            ->description(default: 'Join DivaFam, a vibrant community platform created to uplift, support, and connect women through shared experiences and powerful conversations.')
            ->keywords('DivaFam, women community, female empowerment, sisterhood, wellness for women, support groups, self-care, mental health, inspirational women, connection')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.home');
    }
}
