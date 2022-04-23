<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    protected $table = 'budget_categories';
    //
    protected $fillable = [
        "category_name"
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
