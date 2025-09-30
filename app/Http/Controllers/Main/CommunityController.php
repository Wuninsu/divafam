<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()->title('Communities - ' . config('app.name', 'DivaFam'));
        return view('main.communities');
    }

}
