<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    //
    protected $table= 'relationships';

    protected $fillable = [
        "relationship_value"
    ];
}
