<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Common Resource Routes/Naming
//index - Show all data -> listings || Route::get();
//show - Show single data -> listing || Route::get();
//create - Show form to create new -> listing  || Route::get();
//store - Store data -> new listing || Route::post()
//edit - show form to edit data || Route::put(); Route::patch();
//update - Update data -> listing
//destroy - Delete a data -> listing     Route::delete();

//All listings
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

//Store Listing data
Route::post('/listings', [ListingController::class, 'store']);






//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);



