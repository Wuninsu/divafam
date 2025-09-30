<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()->title('Settings - ' . config('app.name', 'DivaFam'));
        return view('main.settings.index');
    }

    public function restore()
    {
        seo()->title('Restore Data - ' . config('app.name', 'DivaFam'));
        return view('main.settings.restore');
    }

}
