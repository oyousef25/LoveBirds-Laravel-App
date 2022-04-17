<?php

namespace App\Http\Controllers;

use App\SavedVendor;
use Illuminate\Http\Request;

class SavedVendorsController extends Controller
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

    //Create a new task
    public function create(){
        return view('saved-vendors.create');
    }

    //Storing a new task
    public function store(SavedVendor $vendor){
        $vendor->user_id = 1;
        $vendor->save();
        return redirect('saved-vendors');
    }

    //Delete a task
    public function destroy($vendor){
        SavedVendor::destroy($vendor);
        return redirect('saved-vendors');
    }
}
