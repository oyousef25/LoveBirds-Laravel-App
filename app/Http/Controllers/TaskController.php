<?php

namespace App\Http\Controllers;

use App\Task;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //All tasks
    public function index(){
        $tasks = Task::get();

        return view('planning.index', compact("tasks"));
    }

    //A task details
    public function show(Task $task){
        return view('planning.show', compact("task"));
    }
}
