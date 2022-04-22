<?php

namespace App\Http\Controllers;

use App\Guest;
use App\GuestConfirmation;
use App\Mail\GuestInviteCreated;
use App\PartnerInvite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GuestConfirmationController extends Controller
{
    //process the form submission and send the invite by email
    public function process(string $email){
        //Validating the incoming request data
        do{
            //Generate a random token
            $token = Str::random(16);

        }//keep generating a new token if the token already exists
        while(GuestConfirmation::where('token', $token)->first());

        //$currentUser = Auth::user();

        //Create a new invite record and store it in the partner_invites table
        $guest = GuestConfirmation::create([
//            'sender_id' => $currentUser->id,
            'guest_email' => $email,
            'token' => $token,
        ]);

        //Send the email using the mail class that we created
        Mail::to($email)->send(new GuestInviteCreated($guest));
    }

    //here we'll look up the user by the token sent provided in the URL
    public function confirm($token){
        //Handling if the invite doesn't exist
        if(!$guestConfirmation = GuestConfirmation::where('token', $token)->first()){
            //Abort the task
            abort(404);
        }
        if ($invitedGuest = Guest::where('email_address', $guestConfirmation->guest_email)->first()){
            //Making the guest status confirmed
            $invitedGuest->status_id = 2;
            $invitedGuest->save();

            //Delete the invite record so it is not reused
            $guestConfirmation->delete();

            //Here we will put the actions that will happen after the invitation is done successfully but for now we will prove it worked
            return 'See you at the wedding day!';
        }else{
            return 'Guest not found';
        }
    }
}
