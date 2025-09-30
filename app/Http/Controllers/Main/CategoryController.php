<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        seo()->title('Post Categories - ' . config('app.name', 'DivaFam'));
        return view('main.category');
    }
}
