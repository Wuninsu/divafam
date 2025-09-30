<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class FundingController extends Controller
{
    /**
     * Display the funding dashboard overview.
     */
    public function index()
    {
        $donorCount = Donor::count();
        $donationCount = Donation::count();
        $sponsorshipCount = Sponsorship::count();

        $donationTotal = Donation::sum('amount');
        seo()->title('Funding Overview - ' . config('app.name', 'DivaFam'));
        return view('main.funding.index', compact(
            'donorCount',
            'donationCount',
            'sponsorshipCount',
            'donationTotal'
        ));
    }

    public function donorsIndex()
    {
        seo()->title('Donors - ' . config('app.name', 'DivaFam'));
        $donors = Donor::all();
        return view('main.funding.donors', compact('donors'));
    }

    public function donationsIndex()
    {
        seo()->title('Donations - ' . config('app.name', 'DivaFam'));
        $donations = Donation::all();
        return view('main.funding.donations', compact('donations'));
    }

    public function sponsorshipsIndex()
    {
        seo()->title('Sponsorships - ' . config('app.name', 'DivaFam'));
        $sponsorships = Sponsorship::all();
        return view('main.funding.sponsorships', compact('sponsorships'));
    }


}
