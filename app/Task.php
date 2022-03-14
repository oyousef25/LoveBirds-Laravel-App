<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];
    //
    protected $table = 'tasks';

    protected $fillable = [
        "task_title",
        "task_description",
        "due_date",
        "assigned_user",
        "task_price",
        "user_id"
    ];
}
