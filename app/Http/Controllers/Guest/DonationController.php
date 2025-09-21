<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donate()
    {
        return view('guest.donations.donate');
    }

    public function donors()
    {
        return view('guest.donations.donors');
    }
}
