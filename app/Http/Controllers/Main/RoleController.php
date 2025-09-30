<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function roles()
    {
        seo()->title('Roles - ' . config('app.name', 'DivaFam'));
        return view('main.roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function permissions()
    {
        seo()->title('Permissions - ' . config('app.name', 'DivaFam'));
        return view('main.permissions');
    }

}
