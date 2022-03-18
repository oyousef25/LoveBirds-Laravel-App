<?php

namespace App\Http\Controllers;

use App\Task;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index(){
        $tasks = Task::get();

        return view('planning.index', compact("tasks"));
    }

    //A task details
    public function show(Task $task){
        return view('planning.show', compact("task"));
    }

    //Create a new task
    public function create(){
        return view('planning.create');
    }

    //Storing a new task
    public function store(Request $request){
        $task = new Task($request->all());
        $task->user_id = 1;
        $task->save();
        //Task::create($task);
        return redirect('planning');
    }

    //Editing an existing task
    public function edit($task){
        $task = Task::findOrFail($task);
        return view('planning.edit', compact("task"));
    }

    //Updating an existing task
    public function update(Request $request, $task){
        $formData = $request->all();
        $task = Task::findOrFail($task);
        $task->update($formData);

        return redirect('planning');
    }

    public function destroy($task){
        Task::destroy($task);
        return redirect('planning');
    }
}
