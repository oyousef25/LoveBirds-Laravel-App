<?php

namespace App\Mail;

use App\PartnerInvite;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PartnerInvite $invite)
    {
        //
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$currentUserEmail = Auth::email();
        ///return $this->from($currentUserEmail)
        return $this->from('omar-yousef88@hotmail.com')
        ->view('emails.invite');
    }
}
