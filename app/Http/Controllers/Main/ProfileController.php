<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        seo()->title('Profiles - ' . config('app.name', 'DivaFam'));
        return view('main.profiles.index');
    }

    public function show()
    {
        seo()->title('Profile Details - ' . config('app.name', 'DivaFam'));
        return view('main.profiles.show');
    }
}
