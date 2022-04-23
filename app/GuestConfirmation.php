<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestConfirmation extends Model
{
    //
    protected $fillable = [
        'sender_id',
        'guest_email',
        'token',
    ];
}
