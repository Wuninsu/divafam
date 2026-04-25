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

    public function team(Request $request)
    {
        // SEO
        seo()
            ->site(config('app.name') . ' — Empowering Women Through Community and Connection')
            ->title('Our Team - ' . config('app.name'))
            ->description('Meet the team behind ' . config('app.name') . '. We are committed to empowering women and youth through climate-resilient agriculture, livelihoods, and community development.')
            ->keywords('team DivaFam, NGO team Ghana, women empowerment team, agriculture experts, development organization staff')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->twitterSite('@divafam');

        // TEAM MEMBERS (optimized)
        $teamMembers = User::query()
            ->with(['roles']) // avoid N+1 if roles used in view
            ->where('is_team_member', true)
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['dev', 'guest', 'donor', 'beneficiary']);
            })
            ->latest()
            ->get();

        // DONORS (only necessary fields)
        $donors = Donor::query()
            ->select('id', 'name', 'logo') // adjust based on your schema
            ->latest()
            ->get();

        // FAQS (active only)
        $faqs = Faq::query()
            ->where('is_active', true)
            ->latest()
            ->limit(6)
            ->get();

        // MORE ABOUT (safe fetch)
        $more = optional(get_page_by_slug('more-about-us'))->content;

        return view('guest.our-team', [
            'more' => $more,
            'teamMembers' => $teamMembers,
            'donors' => $donors,
            'faqs' => $faqs,
        ]);
    }


    public function impact(Request $request)
    {
        // SEO (FIXED for Impact page)
        seo()
            ->site(config('app.name') . ' — Driving Measurable Impact')
            ->title('Our Impact - ' . config('app.name'))
            ->description('Explore the measurable impact of ' . config('app.name') . ' across Northern Ghana—improving livelihoods, expanding access to water, and strengthening climate-resilient agriculture.')
            ->keywords('NGO impact Ghana, development impact, women empowerment results, agriculture programs impact, rural livelihoods Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->twitterSite('@divafam');

        // IMPACT CONTENT
        $more = optional(get_page_by_slug('impact'))->content;

        return view('guest.impact');
    }
}
