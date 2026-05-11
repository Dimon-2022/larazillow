<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);
        // Accept selected offer
        $offer->update(['accepted_at' => now()]);
        // Make sold out listing
        $listing->sold_at = now();
        $listing->save();

        //Reject all others offers
        $offer->listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted successfully.");

    }
}
