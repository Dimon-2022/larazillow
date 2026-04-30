<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing){
        $listing->load('images');
        return inertia(
            'Realtor/ListingImage/Create',
            ['listing'=> $listing]
        );
    }

    public function store(Listing $listing, Request $request){
        if($request->hasFile('images')){
            $request->validate([
                'images.*' => 'mimes:jpeg,png,jpg,webp|max:5000',
            ], [
                'images.*.mimes' => 'Only jpeg, png, webp and jpg images are allowed.',
            ]);
            foreach($request->file('images') as $file){
                $path = $file->store('images', 'public');

                $image = new ListingImage([
                    'filename' => $path,
                ]);

                $listing->images()->save($image);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    public function destroy($listing, ListingImage $image){
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
