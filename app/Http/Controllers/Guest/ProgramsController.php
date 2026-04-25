<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Our Projects - ' . config('app.name', 'DivaFam'))
            ->description('Discover the impactful projects by DivaFam that support women and youth, from sustainable farming programs to clean water initiatives and educational efforts.')
            ->keywords('DivaFam projects, women empowerment projects, sustainable farming, clean water initiatives, youth programs, community development')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('projects', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $project)
    {
        $project = Project::with('user')
            ->withCount('beneficiaries')->where('slug', $project)->firstOrFail();

        // Load project SEO data (if exists)
        $seo = $project->seo;

        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Project Detail- ' . $project->title . ' | ' . config('app.name', 'DivaFam'))
            ->description($seo?->meta_description ?? $project->short_description ?? '')
            ->keywords($seo?->meta_keywords ?? $project->tags ?? '')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => $project->cover_image
                ? asset('storage/' . $project->cover_image)
                : asset(setup_data('favicon')))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.programs.detail', compact('project'));
    }

}
