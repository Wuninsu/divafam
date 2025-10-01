<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        seo()->title('Profiles - ' . config('app.name', 'DivaFam'));
        return view('main.profiles.index');
    }

    public function show(User $user)
    {
        $userData = $user;
        seo()->title('Profile Details - ' . config('app.name', 'DivaFam'));
        return view('main.profiles.show', compact('userData'));
    }
}
