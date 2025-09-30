<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        seo()
            ->site('DivaFam — Empowering Women Through Community and Connection')
            ->title('Gallery - ' . config('app.name', 'DivaFam'))
            ->description('Explore the visual journey of DivaFam’s impact through images of our community events, women-led initiatives, and sustainable farming projects.')
            ->keywords('DivaFam gallery, women empowerment photos, sustainable farming images, community events, agricultural projects, youth training')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset(setup_data('favicon')))
            ->flipp('gallery', 'your_flipp_id_here')
            ->twitterSite('@divafam');
        $mediaItems = Media::with('project')
            ->latest()
            ->paginate(paginationLimit());

        return view('guest.gallery', compact('mediaItems'));
    }
}
