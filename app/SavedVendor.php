<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedVendor extends Model
{
    //
    protected $fillable = [
        'vendor_title',
        'vendor_description',
        'vendor_rating',
        'vendor_website',
        'vendor_location',
        'vendor_phone',
        'vendor_image',
        'user_id'
    ];
}
