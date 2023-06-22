<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show All Listings
    public function index() {
        // dd(request());
        // dd(request()->tag);
        // dd(request('tag'));
        // dd(Listing::latest()->filter(request(['tag','search']))->paginate(2));
        return view('listings.index', [
           
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4)
        ]);
    }

    //show single listing
    public function show(Listing $listing) {
        return view('listings.show' , [
            'listing' => $listing
        ]);
    }

    //Show Create Form
    public function create() {
        return view('listings.create');
    } 

    //Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'            
        ]);

        Listing::create($formFields);

        return redirect('/')->with('message', 'Job Posting created successfully!');
    }
}
