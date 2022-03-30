<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerInvite extends Model
{
    //
    protected $fillable = [
        'email',
        'token',
    ];
}
