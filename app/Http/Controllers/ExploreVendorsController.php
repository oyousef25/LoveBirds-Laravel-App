<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Support\Facades\Http;

class ExploreVendorsController extends Controller
{
    protected $returnedVendors;

    //The user must be logged in to access this page
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index()
    {
        $vendorCategories = ["Venue", "Gown", "Photographer", "Florist", "Gift"];

        return view('explore-vendors.index', compact("vendorCategories"));
    }

    //A task details
    public function show($vendor)
    {
        switch ($vendor){
            case "Venue":
                $url = 'https://api.foursquare.com/v3/places/search?query=Club&fields=name%2Clocation%2Ctel%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON';
                break;
            case "Gown":
                $url = 'https://api.foursquare.com/v3/places/search?query=Boutique&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON';
                break;
            case "Photographer":
                $url = 'https://api.foursquare.com/v3/places/search?query=Photo&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON';
                break;
            case "Florist":
                $url = 'https://api.foursquare.com/v3/places/search?query=Florist&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON';
                break;
            case "Gift":
                $url = 'https://api.foursquare.com/v3/places/search?query=Wedding%20Gift&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON';
                break;
            default:
                $url = 'https://api.foursquare.com/v3/places/search?query=Boutique&fields=name%2Clocation%2Cdescription%2Cwebsite%2Crating%2Cphotos&near=Windsor%2C%20ON';
        }

        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', $url, [
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

        $this->returnedVendors = $allVendors;

        return view('explore-vendors.show', compact("allVendors"));
    }

    public function showDetails($vendorName){

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

        foreach ($allVendors as $item){
            if (isset($item->name) && $item->name == $vendorName){
                $vendor = $item;
            }
        }
        return view('explore-vendors.details', compact("vendor"));
    }
}
