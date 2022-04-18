<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function getUser($email){
        //get the passed user
        $currentUser = User::where("email", $email)->first();
        $userPartner = User::where("email", $currentUser->partner_email)->first();

        $userTasks = Task::where("user_id", $currentUser->id)->get();
        $partnerTasks = Task::where("user_id", $userPartner->id)->get();

        return \Response::json([
            'user' => $currentUser,
            'partner' => $userPartner,
            'user_tasks' => $userTasks->count(),
            'partner_tasks' => $partnerTasks->count(),
        ]);
    }

    //
    public function updateUser(Request $request){
        
    }

    //
    public function updatePartner($email){

    }
}
