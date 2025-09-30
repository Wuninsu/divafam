<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()->title('Media Library - ' . config('app.name', 'DivaFam'));
        return view('main.media.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        seo()->title('View Media - ' . config('app.name', 'DivaFam'));

        $projectId = Media::where('project_id', $id)->pluck('project_id')->first();
        return view('main.media.show', compact('projectId'));
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
