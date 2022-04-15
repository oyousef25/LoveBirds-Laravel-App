<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /*
     * In this controller we will need to do the following:
     * Pass the current user
     * Pass the current user's partner
     * Handle updating the user
     */

    //Passing the current user and their partner
    public function index(){
        $currentUser = Auth::user();

        if($currentUser->partner_email != null){
            $userPartner = User::where('email', $currentUser->partner_email)->first();
        }else{
            $userPartner = User::create([
                'name' => 'N/A',
                'email' => 'N/A',
                'password' => 'N/A'
            ]);
        }

        $currentUserTasks = Task::all()->where('user_id', $currentUser->id);
        $userPartnerTasks = Task::all()->where('user_id', $userPartner->id);

        return view('account.index', compact("currentUser", "userPartner", "currentUserTasks", "userPartnerTasks"));
    }

    //Editing the current user
    public function edit($guest){
//        $relationships = Relationship::all()->pluck('relationship_value', 'id');
//
//        $guest = Guest::findOrFail($guest);
//        return view('guests.edit', compact("guest", "relationships"));
    }

    //Updating the current user
    public function update(Request $request, $guest){
//        $formData = $request->all();
//        $guest = Guest::findOrFail($guest);
//        $guest->update($formData);
//
//        return redirect('guests');
    }
}
