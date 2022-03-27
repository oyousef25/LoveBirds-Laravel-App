<?php

namespace App\Http\Controllers;

use App\CustomVendor;
use Illuminate\Http\Request;

class CustomVendorController extends Controller
{
    //The user must be logged in to access this page
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index(){
        $vendors = CustomVendor::get();

        return view('vendors.index', compact("vendors"));
    }

    //A task details
    public function show(CustomVendor $vendor){
        return view('vendors.show', compact("vendor"));
    }

    //Create a new task
    public function create(){
        return view('vendors.create');
    }

    //Storing a new task
    public function store(Request $request){
        $vendor = new CustomVendor($request->all());
        $vendor->user_id = 1;
        $vendor->save();
        return redirect('vendors');
    }

    //Editing an existing task
    public function edit($task){
        $vendor = CustomVendor::findOrFail($task);
        return view('vendors.edit', compact("vendor"));
    }

    //Updating an existing task
    public function update(Request $request, $vendor){
        $formData = $request->all();
        $vendor = CustomVendor::findOrFail($vendor);
        $vendor->update($formData);

        return redirect('vendors');
    }

    //Delete a task
    public function destroy($vendor){
        CustomVendor::destroy($vendor);
        return redirect('vendors');
    }
}
