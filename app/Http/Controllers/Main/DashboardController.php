<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Dashboard - ' . config('app.name', 'DivaFam'))

            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('dashboard', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        $totalDonations = Donation::sum('amount');
        $activeDonors = Donor::count();
        $projectsCount = Project::count();
        $beneficiariesCount = Beneficiary::count();


        // Donation trends (last 12 months)
        $donationTrends = Donation::select(
            DB::raw("DATE_FORMAT(donation_date, '%Y-%m') as month"),
            DB::raw("SUM(amount) as total")
        )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->take(12)
            ->pluck('total', 'month');

        // Recent donations
        $recentDonations = Donation::with('donor')
            ->latest()
            ->take(5)
            ->get();

        // Top donors
        $topDonors = Donor::withSum('donations', 'amount')
            ->orderByDesc('donations_sum_amount')
            ->take(5)
            ->get();


        // Recent Projects (last 5 with beneficiaries count)
        $recentProjects = Project::withCount('beneficiaries')
            ->latest()
            ->take(5)
            ->get();

        return view('main.dashboard', compact(
            'totalDonations',
            'activeDonors',
            'projectsCount',
            'beneficiariesCount',
            'donationTrends',
            'recentDonations',
            'topDonors',
            'recentProjects'
        ));
    }
}
