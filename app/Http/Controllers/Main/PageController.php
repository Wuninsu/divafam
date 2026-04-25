<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        seo()->title('Pages - ' . config('app.name', 'DivaFam'));

        return view('main.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug',
            'content' => 'required|string',
            'type' => 'required|string|in:terms,privacy,page',
            'is_active' => 'boolean',
        ]);
        // Start a DB transaction
        DB::beginTransaction();

        try {
            // Auto-generate slug if not given
            if (empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            } else {
                $validated['slug'] = Str::slug($validated['slug']);
            }

            // Create the page
            $page = Page::create($validated);



            // Commit the transaction
            DB::commit();

            return redirect()->route('pages.index')->with('success', 'Page created successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction if something fails
            DB::rollBack();

            // Log the error for debugging purposes
            Log::error('Error creating page: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all(),
            ]);

            flash('There was an error creating the page.', 'error', );
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('main.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {

        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'type' => 'required|string|in:terms,privacy,page',
            'is_active' => 'boolean',
        ]);


        DB::beginTransaction();

        try {


            // Auto-generate slug if not given
            $validated['slug'] = Str::slug($validated['slug'] ?: $validated['title']);

            // Update the page
            $page->update($validated);

            // Commit the transaction
            DB::commit();

            // Flash success message
            return redirect()->route('pages.index')->with('success', 'Page updated successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Log the error with more detailed information
            Log::error('Error updating page: ' . $e->getMessage(), [
                // 'exception' => $e,
                'request_data' => $request->all(),
                'page_id' => $page->id,
            ]);

            // Flash error message
            return back()->withInput()->with('error', 'There was an error updating the page.');
        }
    }



    public function faq()
    {
        seo()->title('FAQ’s - ' . config('app.name', 'DivaFam'));
        return view('main.pages.faq');
    }



    public function inquiry()
    {
        seo()->title('Inquiries - ' . config('app.name', 'DivaFam'));

        return view('main.pages.inquiry');
    }

    public function home()
    {
        seo()->title('Home Content - ' . config('app.name', 'DivaFam'));
        return view('main.pages.home');
    }

    public function document(){
        seo()->title('Documents - ' . config('app.name', 'DivaFam'));
        return view('main.pages.documents');
    }

}
