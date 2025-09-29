<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('main.profiles.index');
    }

    public function show()
    {
        return view('main.profiles.show');
    }
}
