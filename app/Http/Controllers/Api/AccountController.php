<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //Passing the user and partner to the app
    public function getUser($email){
        //get the passed user
        $currentUser = User::where("email", $email)->first();

        if($currentUser->partner_email != null){
            $userPartner = User::where('email', $currentUser->partner_email)->first();
        }else{
            $userPartner = new User();
        }

        $userTasks = Task::where("user_id", $currentUser->id)->get();
        $partnerTasks = Task::where("user_id", $userPartner->id)->get();

        return \Response::json([
            'user' => $currentUser,
            'partner' => $userPartner,
            'user_tasks' => $userTasks->count(),
            'partner_tasks' => $partnerTasks->count(),
        ]);
    }

    //Updating the user with the data passed by the app
    public function updateUser(Request $request, $id){
        $currentUser = User::findOrFail($id);
        $currentUser->update($request->all());
        $currentUser->save();
        return $currentUser;
    }

    //Sending another partner invitation using the
    public function updatePartner($email){

    }
}
