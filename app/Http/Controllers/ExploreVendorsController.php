<?php

namespace App\Http\Controllers;

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
        $vendors = SavedVendor::get();

        return view('saved-vendors.index', compact("vendors"));
    }

    //A task details
    public function show(SavedVendor $vendor){
        return view('saved-vendors.show', compact("vendor"));
    }
}
