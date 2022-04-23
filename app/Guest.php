<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    protected $fillable = [
        "first_name",
        "last_name",
        "guest_relationship",
        "email_address",
        "phone_number",
        "status_id",
        "user_id"
    ];
}
