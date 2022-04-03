<?php

namespace App\Http\Controllers;

use App\Mail\InviteCreated;
use App\PartnerInvite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitePartnerController extends Controller
{
    //show a user a form with an email field to invite a new user
    public function invite(){
        return view('partner.invite');
    }

    //process the form submission and send the invite by email
    public function process(Request $request){
        //Validating the incoming request data
        do{
            //Generate a random token
            $token = Str::random(16);

        }//keep generating a new token if the token already exists
        while(PartnerInvite::where('token', $token)->first());

        $currentUser = Auth::user();
        $invitedUser = User::where('email', $request->get('email'));

//        if ($currentUser->partner_email != null ||
//            $invitedUser->partner_email != null){
//
//        }
        //Create a new invite record and store it in the partner_invites table
        $invite = PartnerInvite::create([
            'sender_id' => $currentUser->getAuthIdentifier(),
            'partner_email' => $request->get('email'),
            'token' => $token,
        ]);

        //Send the email using the mail class that we created
        Mail::to($request->get('email'))->send(new InviteCreated($invite));

        //redirect the user to where they came from
        return redirect()->back();

    }

    //here we'll look up the user by the token sent provided in the URL
    public function accept($token){
        //Handling if the invite doesn't exist
        if(!$invite = PartnerInvite::where('token', $token)->first()){
            //Abort the task
            abort(404);
        }

        //Finding both users
        $currentUser = User::where('id', $invite->sender_id)->first();
        $invitedUser = User::where('email', $invite->partner_email)->first();

        //Assigning both users partner emails to each other
        $currentUser->partner_email = $invitedUser->partner_email;
        $invitedUser->partner_email = $currentUser->partner_email;

        $currentUser->update(['partner_email' => $invitedUser->partner_email]);
        $invitedUser->save();

        //Delete the invite record so it is not reused
        $invite->delete();

        //Here we will put the actions that will happen after the invitation is done successfully but for now we will prove it worked
        return 'Good job! ' . $invitedUser->name . ' Invite accepted!';
    }
}
