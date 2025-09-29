<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
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
            ->image(default: fn() => asset('images/projects-banner.jpg'))
            ->flipp('projects', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        return view('guest.projects.detail', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
