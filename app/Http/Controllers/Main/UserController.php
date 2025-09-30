<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()->title('Users - ' . config('app.name', 'DivaFam'));
        return view('main.users.index');
    }

    public function managePermission($user)
    {
        seo()->title('Manage Permissions - ' . config('app.name', 'DivaFam'));
        return view('main.users.manage-permissions', ['user' => $user]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        seo()->title('Create User - ' . config('app.name', 'DivaFam'));
        return view('main.users.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        seo()->title('Edit User - ' . config('app.name', 'DivaFam'));
        return view('main.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function teamMembers()
    {
        seo()->title('Team Members - ' . config('app.name', 'DivaFam'));
        return view('main.users.team-members');
    }
}
