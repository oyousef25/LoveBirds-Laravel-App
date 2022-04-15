<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Relationship;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $totalGuests = Guest::all();
        $guests = Guest::paginate(8);

        $relationships_table = DB::table('relationships');

        return view('guests.index', compact("guests", "relationships_table", "totalGuests"));
    }

    //A task details
    public function show(Guest $guest){
        //Finding the relationship value and passing it to the view
        $relationship = Relationship::findOrFail($guest->guest_relationship);
        $relationship_value = $relationship->relationship_value;

        return view('guests.show', compact("guest", "relationship_value"));
    }

    //Create a new task
    public function create(){
        $relationships = Relationship::all()->pluck('relationship_value', 'id');

        return view('guests.create', compact("relationships"));
    }

    //Storing a new task
    public function store(Request $request){
        $guest = new Guest($request->all());
        $guest->user_id = auth()->user()->id;
        $guest->save();

        (new GuestConfirmationController)->process($guest->email_address);

        return redirect('guests');
    }

    //Editing an existing task
    public function edit($guest){
        $relationships = Relationship::all()->pluck('relationship_value', 'id');

        $guest = Guest::findOrFail($guest);
        return view('guests.edit', compact("guest", "relationships"));
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
