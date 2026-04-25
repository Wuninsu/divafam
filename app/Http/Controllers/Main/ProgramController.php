<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()->title('Programs - ' . config('app.name', 'DivaFam'));
        return view('main.programs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        seo()->title('Add program - ' . config('app.name', 'DivaFam'));
        return view('main.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:programs,slug',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|in:draft,ongoing,completed',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'amount_spent' => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'tags' => 'nullable|string|max:255',
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

            // Handle cover image upload
            if ($request->hasFile('cover_image')) {
                $validated['cover_image'] = $request->file('cover_image')->store('uploads/programs', 'public');
            }

            // Assign user ID
            $validated['user_id'] = auth('web')->id();

            // Create the program
            $program = program::create($validated);

            // Store SEO if provided
            if ($request->filled('title') || $request->filled('short_description')) {
                $program->seo()->create([
                    'meta_title' => $request->input('title'),
                    'meta_description' => $request->input('short_description'),
                    'meta_keywords' => $request->input('tags'),
                ]);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('programs.index')->with('success', 'program created successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction if something fails
            DB::rollBack();

            // Log the error for debugging purposes
            Log::error('Error creating program: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all(),
            ]);

            flash('There was an error creating the program.', 'error', );
            return back();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        seo()->title('program Details - ' . config('app.name', 'DivaFam'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        // Load program SEO data (if exists)
        $seo = $program->seo;

        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Edit program - ' . $program->title . ' | ' . config('app.name', 'DivaFam'))
            ->description($seo?->meta_description ?? $program->short_description ?? '')
            ->keywords($seo?->meta_keywords ?? $program->tags ?? '')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => $program->cover_image
                ? asset('storage/' . $program->cover_image)
                : asset(setup_data('favicon')))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('main.programs.edit', [
            'program' => $program,
            'seo' => $seo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, program $program)
    {
        DB::beginTransaction();

        try {
            // Validate request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|unique:programs,slug,' . $program->id,
                'short_description' => 'required|string|max:500',
                'description' => 'required|string',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'required|string|in:draft,ongoing,completed',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'location' => 'nullable|string|max:255',
                'budget' => 'nullable|numeric|min:0',
                'amount_spent' => 'nullable|numeric|min:0',
                'is_featured' => 'boolean',
                'is_active' => 'boolean',
                'tags' => 'nullable|string|max:255',
            ]);

            // Auto-generate slug if not given
            if (empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            } else {
                $validated['slug'] = Str::slug($validated['slug']);
            }

            // Handle cover image upload
            if ($request->hasFile('cover_image')) {
                // Delete old cover if exists
                if ($program->cover_image && Storage::disk('public')->exists($program->cover_image)) {
                    deleteImage($program, 'cover_image');
                }

                $validated['cover_image'] = uploadFile($request->file('cover_image'), 'uploads/programs');
                // $validated['cover_image'] = $request->file('cover_image')->store('uploads/programs', 'public');
            }

            // Keep user_id unchanged (or reassign if you want current user)
            $validated['user_id'] = $program->user_id ?? auth('web')->id();

            // Update the program
            $program->update($validated);

            // Update or create SEO
            $program->seo()->updateOrCreate(
                ['seoable_id' => $program->id, 'seoable_type' => program::class],
                [
                    'meta_title' => $request->input('title'),
                    'meta_description' => $request->input('short_description'),
                    'meta_keywords' => $request->input('tags'),
                ]
            );

            DB::commit();

            return redirect()->route('programs.index')->with('success', 'program updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error updating program: ' . $e->getMessage(), [
                // 'exception' => $e,
                'request_data' => $request->all(),
            ]);

            flash('There was an error updating the program.', 'error');
            return back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
