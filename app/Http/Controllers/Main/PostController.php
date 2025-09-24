<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('main.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'summary' => 'required|string|max:500',
            'status' => 'nullable',
            'content' => 'required|string|min:20',
            'category_id' => 'required|exists:categories,id',
            'is_approved' => 'sometimes|boolean',
            'is_featured' => 'sometimes|boolean',
            'is_active' => 'sometimes|boolean',
            'cover_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        try {
            DB::transaction(function () use ($validated, $request) {
                // Auto-generate slug if not given
                if (empty($validated['slug'])) {
                    $validated['slug'] = Str::slug($validated['title']);
                } else {
                    $validated['slug'] = Str::slug($validated['slug']);
                }

                // Handle cover image upload
                if ($request->hasFile('cover_image')) {
                    $validated['cover_image'] = uploadFile($request->file('cover_image'), 'uploads/posts');
                }

                // Assign user ID
                $validated['author_id'] = auth('web')->id();

                $validated['published_at'] = $validated['status'] == 'published' ? now() : null;

                // Create the project
                $post = Post::create($validated);

                // Attach tags
                if (!empty($validated['tags'])) {
                    $post->tags()->attach($validated['tags']);
                }


                // Store SEO if provided
                if ($request->filled('title') || $request->filled('summary')) {
                    $tagNames = Tag::whereIn('id', $request->input('tags', []))->pluck('name')->toArray();

                    $post->seo()->create([
                        'meta_title' => $request->input('title'),
                        'meta_description' => $request->input('summary'),
                        'meta_keywords' => implode(', ', $tagNames),
                    ]);
                }
            });

            return redirect()->route('posts.index')->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating post: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all(),
            ]);
            return back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Post $post)
    {
        // Load post SEO data (if exists)
        $seo = $post->seo;

        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Edit Post - ' . $post->title . ' | ' . config('app.name', 'DivaFam'))
            ->description($seo?->meta_description ?? $post->short_description ?? '')
            ->keywords($seo?->meta_keywords ?? $post->tags ?? '')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => $post->cover_image
                ? asset($post->cover_image)
                : asset(setup_data('favicon')))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');
        $categories = Category::all();
        $tags = Tag::all();
        return view('main.posts.edit', compact('seo', 'post', 'categories', 'tags'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'summary' => 'required|string|max:500',
            'status' => 'nullable',
            'content' => 'required|string|min:20',
            'category_id' => 'required|exists:categories,id',
            'is_approved' => 'sometimes|boolean',
            'is_featured' => 'sometimes|boolean',
            'is_active' => 'sometimes|boolean',
            'cover_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        try {
            DB::transaction(function () use ($validated, $request, $post) {
                // Auto-generate slug if not provided
                $validated['slug'] = Str::slug($validated['slug'] ?? $validated['title']);

                // Handle cover image upload
                if ($request->hasFile('cover_image')) {
                    // Optional: delete old image
                    if ($post->cover_image) {
                        deleteImage($post, 'cover_image');
                    }

                    $validated['cover_image'] = uploadFile($request->file('cover_image'), 'uploads/posts');
                }

                // Update publish date based on status
                $validated['published_at'] = $validated['status'] === 'published' ? now() : null;

                // Update post
                $post->update($validated);

                // Sync tags
                $post->tags()->sync($validated['tags'] ?? []);

                // Update or create SEO
                $tagNames = Tag::whereIn('id', $request->input('tags', []))->pluck('name')->toArray();

                $post->seo()->updateOrCreate([], [
                    'meta_title' => $request->input('title'),
                    'meta_description' => $request->input('summary'),
                    'meta_keywords' => implode(', ', $tagNames),
                ]);
            });

            return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all(),
            ]);
            return back()->with('error', 'Something went wrong. Please try again.')->withInput();
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
