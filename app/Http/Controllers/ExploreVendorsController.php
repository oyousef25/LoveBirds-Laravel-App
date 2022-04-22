<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Support\Facades\Http;

class ExploreVendorsController extends Controller
{
    //The user must be logged in to access this page
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index()
    {
        $vendorCategories = ["Venues", "Boutiques", "Photography", "Flower Stores", "Gifts"];

        return view('explore-vendors.index', compact("vendorCategories"));
    }

    //A task details
    public function show()
    {

        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.foursquare.com/v3/places/search?query=Clubs&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'fsq3+0NhCeZmuY7A4sPIaenwvm5mBuVG8SA63KcT9o9ZEsE=',
            ],
        ]);

        $results = json_decode($response->getBody());
        $allVendors = array();

        foreach ($results as $vendors){
            foreach ($vendors as $vendor){
                array_push($allVendors, $vendor);
            }
        }
        return view('explore-vendors.show', compact("allVendors"));
    }
}
