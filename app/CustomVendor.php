<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomVendor extends Model
{
    //
    protected $fillable = [
        'vendor_name',
        'vendor_description',
        'phone_number',
        'job_title',
        'user_id'
    ];
}
