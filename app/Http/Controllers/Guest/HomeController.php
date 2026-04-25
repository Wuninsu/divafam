<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Project;
use App\Models\SetupMeta;

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
        $worksData = get_home_content_by_type('how_it_works');
        $impactData = get_home_content_by_type('community_impact');
        $carousel = get_home_content_by_type('carousel');

        $carouselData = [];
        if ($carousel) {
            $items = $carousel->carousel_items ?? [];

            usort($items, function ($a, $b) {
                return ($a['order'] ?? 0) <=> ($b['order'] ?? 0);
            });

            $carouselData = $items;
        }
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

        $featuredProjects = Project::where('is_featured', true)
            ->where('is_active', true)->latest()->limit(4)->get();
        $featuredPosts = Post::where('is_featured', true)
            ->where('is_active', true)
            ->where('is_approved', true)->latest()->limit(3)->get();
        $faqs = Faq::where('is_active', true)->limit(6)->get();
        $donors = Donor::all();
        $testimonies = Inquiry::where('type', '=', 'testimony')->where('status', true)->latest()->limit(5)->get();
        return view('guest.home', compact([
            'featuredProjects',
            'featuredPosts',
            'faqs',
            'donors',
            'testimonies',
            'worksData',
            'impactData',
            'carouselData'
        ]));
    }


    public function partners()
    {
        $worksData = get_home_content_by_type('how_it_works');
        $impactData = get_home_content_by_type('community_impact');
        $carousel = get_home_content_by_type('carousel');

        $carouselData = [];
        if ($carousel) {
            $items = $carousel->carousel_items ?? [];

            usort($items, function ($a, $b) {
                return ($a['order'] ?? 0) <=> ($b['order'] ?? 0);
            });

            $carouselData = $items;
        }
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

        $featuredProjects = Project::where('is_featured', true)
            ->where('is_active', true)->latest()->limit(4)->get();
        $featuredPosts = Post::where('is_featured', true)
            ->where('is_active', true)
            ->where('is_approved', true)->latest()->limit(3)->get();
        $faqs = Faq::where('is_active', true)->limit(6)->get();
        $activePartners = Donor::where('is_active', true)->get();
        $pastPartners = Donor::where('is_active', false)->get();
        return view('guest.partners', compact([
            'activePartners',
            'pastPartners'
        ]));
    }
}
