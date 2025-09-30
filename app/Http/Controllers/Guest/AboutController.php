<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Faq;
use App\Models\User;
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
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('about', 'your_flipp_id_here')
            ->twitterSite('@divafam');
        $teamMembers = User::query()
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['dev', 'guest', 'donor', 'beneficiary']);
            })->where('is_team_member', true)
            ->latest()->get();
        $donors = Donor::all();
        $faqs = Faq::where('is_active', true)->limit(6)->get();
        $more = get_page_by_slug('more-about-us');
        $more = $more->content ?? null;
        return view('guest.about-us', compact('more', 'teamMembers', 'donors', 'faqs'));
    }
}
