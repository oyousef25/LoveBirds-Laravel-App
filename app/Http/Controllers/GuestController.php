<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct(){
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index(){
        $guests = Guest::get();

        return view('guests.index', compact("guests"));
    }

    //A task details
    public function show(Guest $guest){
        return view('guests.show', compact("guest"));
    }

    //Create a new task
    public function create(){
        return view('guests.create');
    }

    //Storing a new task
    public function store(Request $request){
        $task = new Guest($request->all());
        $task->user_id = 1;
        $task->save();
        //Task::create($task);
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
