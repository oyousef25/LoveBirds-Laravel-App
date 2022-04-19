<?php

namespace App\Http\Controllers;

use App\SavedVendor;
use Illuminate\Http\Request;

class ExploreVendorsController extends Controller
{
    //The user must be logged in to access this page
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index(){
        $vendorCategories = ["Venues", "Boutiques", "Photography", "Flower Stores", "Gifts"];

        return view('explore-vendors.index', compact("vendorCategories"));
    }

    //A task details
    public function show(SavedVendor $vendor){
        require_once('vendor/autoload.php');

        $response = Http::get('https://api.foursquare.com/v3/places/search?query=Wedding%20Gift&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON');

        $vendors = $response->getBody();
        echo $vendors;
        return view('explore-vendors.show', compact("vendors"));
    }
}
