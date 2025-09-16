<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Blog - ' . config('app.name', 'DivaFam'))
            ->description('Explore the latest blog posts by DivaFam. Read inspiring stories, community updates, and insights on women’s empowerment, agriculture, and sustainability.')
            ->keywords('DivaFam blog, women empowerment blog, sustainable farming blog, community stories, agriculture, women in agriculture')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('images/blog-banner.jpg'))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.blogs');
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
    public function show(string $id)
    {
        return view('guest.blogs.detail');
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
