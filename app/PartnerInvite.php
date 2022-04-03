<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerInvite extends Model
{
    //
    protected $fillable = [
        'sender_id',
        'partner_email',
        'token',
    ];
}
