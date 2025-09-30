<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        seo()->title('Beneficiaries - ' . config('app.name', 'DivaFam'));
        return view('main.beneficiaries');
    }

}
