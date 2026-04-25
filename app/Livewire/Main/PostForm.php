<?php

namespace App\Livewire\Main;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostForm extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $summary;
    public $status;
    public $content;
    public $category_id;
    public $is_approved = false;
    public $is_featured = false;
    public $is_active = true;
    public $cover_image;
    public $tags = [];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'summary' => 'required|string|max:500',
            'status' => 'nullable',
            'content' => 'required|string|min:20',
            'category_id' => 'required|exists:categories,id',
            'is_approved' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'cover_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ];
    }

    public function savePost()
    {
          dd($this->title,$this->content);
        $validated = $this->validate();
      
        try {

            DB::transaction(function () use (&$validated) {

                $content = $validated['content'];
                $imagePath = 'uploads/posts/';

                if (!Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->makeDirectory($imagePath);
                }

                $dom = new DOMDocument();
                @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $images = $dom->getElementsByTagName('img');

                foreach ($images as $img) {

                    $src = $img->getAttribute('src');

                    if (strpos($src, 'data:image') === 0) {

                        $data = base64_decode(explode(',', $src)[1]);
                        $imageName = Str::uuid() . '.png';

                        Storage::disk('public')->put($imagePath . $imageName, $data);

                        $img->setAttribute(
                            'src',
                            Storage::url($imagePath . $imageName)
                        );
                    }
                }

                $validated['content'] = $dom->saveHTML();

                // slug
                $validated['slug'] = $validated['slug']
                    ? Str::slug($validated['slug'])
                    : Str::slug($validated['title']);

                // cover image
                if ($this->cover_image) {
                    $validated['cover_image'] =
                        $this->cover_image->store($imagePath, 'public');
                }

                $validated['author_id'] = auth('web')->id();

                $validated['published_at'] =
                    $this->status === 'published' ? now() : null;

                $post = Post::create($validated);

                // attach tags
                if (!empty($this->tags)) {
                    $post->tags()->attach($this->tags);
                }

                // SEO
                if ($this->title || $this->summary) {

                    $tagNames = Tag::whereIn('id', $this->tags)
                        ->pluck('name')
                        ->toArray();

                    $post->seo()->create([
                        'meta_title' => $this->title,
                        'meta_description' => $this->summary,
                        'meta_keywords' => implode(', ', $tagNames),
                    ]);
                }
            });

            session()->flash('success', 'Post created successfully.');

            return redirect()->route('posts.index');

        } catch (\Exception $e) {

            Log::error('Error creating post: ' . $e->getMessage());

            session()->flash('error', 'Something went wrong.');

        }
    }

    public function render()
    {
         $categories = Category::all();
        $tags = Tag::all();
        return view('livewire.main.post-form',compact('categories','tags'));
    }
}
