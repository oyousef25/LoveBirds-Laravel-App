<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //The user must be logged in to access this page
    public function __construct(){
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index(){
        $guests = Guest::get();

        $relationships_table = DB::table('relationships');

        return view('guests.index', compact("guests", "relationships_table"));
    }

    //A task details
    public function show(Guest $guest){
        $relationships_table = DB::table('relationships');

        return view('guests.show', compact("guest", "relationships_table"));
    }

    //Create a new task
    public function create(){
        $relationships = Relationship::get();

        return view('guests.create', compact("relationships"));
    }

    //Storing a new task
    public function store(Request $request){
        $task = new Guest($request->all());
        $task->user_id = 1;
        $task->guest_relationship = 2;
        $task->save();
        return redirect('guests');
    }

    //Editing an existing task
    public function edit($guest){
        $guest = Guest::findOrFail($guest);
        return view('guests.edit', compact("guest"));
    }

    //Updating an existing task
    public function update(Request $request, $guest){
        $formData = $request->all();
        $guest = Guest::findOrFail($guest);
        $guest->update($formData);

        return redirect('guests');
    }

    //Delete a guest
    public function destroy($guest){
        Guest::destroy($guest);
        return redirect('guests');
    }
}
