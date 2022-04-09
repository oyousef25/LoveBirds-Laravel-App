<?php

namespace App\Mail;

use App\GuestConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuestInviteCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $invite;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(GuestConfirmation $invite)
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
        $invite = $this->invite;
        return $this->from('omar-yousef88@hotmail.com')
            ->view('emails.confirmation', compact("invite"));
    }
}
