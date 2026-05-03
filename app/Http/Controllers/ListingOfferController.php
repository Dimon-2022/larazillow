<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
    public function store(Request $request, Listing $listing){
        $listing->offers()->save(
            Offer::make($request->validate([
                'amount' => 'required|integer|min:1|max:2000000',
            ]))->bidder()->associate($request->user())
        );

        return redirect()->back()->with('success', 'Offer created successfully.');
    }
}
