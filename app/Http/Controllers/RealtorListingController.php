<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function index(){
        $user = Auth::user();
        $listings = $user->listings()->get();

        return inertia('Realtor/Index', $listings);
    }
}
