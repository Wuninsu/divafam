<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request as Req;

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
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');

        return view('guest.blogs.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::with(['author', 'tags', 'category', 'likes.user'])
            ->withCount('likes')
            ->where('slug', $slug)->firstOrFail();

        // Load post SEO data (if exists)
        $seo = $post->seo;

        //  properly calculate post views
        $ipAddress = Req::ip();
        $userAgent = Req::header('User-Agent');

        // Create a unique key per post + device + IP
        $uniqueKey = md5("post_{$post->id}_{$ipAddress}_{$userAgent}");
        $cacheKey = "viewed_post_{$uniqueKey}";

        if (!Cache::has($cacheKey)) {
            $post->increment('views');
            Cache::put($cacheKey, true, now()->addYear());
        }

        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('News Detail - ' . $post->title . ' | ' . config('app.name', 'DivaFam'))
            ->description($seo?->meta_description ?? $post->short_description ?? '')
            ->keywords($seo?->meta_keywords ?? $post->tags ?? '')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => $post->cover_image
                ? asset($post->cover_image)
                : asset(setup_data('favicon')))
            ->flipp('blog', 'your_flipp_id_here')
            ->twitterSite('@divafam');
        return view('guest.blogs.detail', compact('post'));
    }

}