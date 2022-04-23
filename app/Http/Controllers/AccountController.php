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
            $userPartner = new User();
        }

        $currentUserTasks = Task::all()->where('user_id', $currentUser->id);
        $userPartnerTasks = Task::all()->where('user_id', $userPartner->id);

        return view('account.index', compact("currentUser", "userPartner", "currentUserTasks", "userPartnerTasks"));
    }

    //Editing the current user
    public function edit($user_id){
        $currentUser = User::findOrFail($user_id);
        return view('account.edit', compact("currentUser"));
    }

    //Updating the current user
    public function update(Request $request, $user_id){
        $formData = $request->all();
        $currentUser = User::findOrFail($user_id);
        $currentUser->update($formData);

        return redirect('account');
    }
}
