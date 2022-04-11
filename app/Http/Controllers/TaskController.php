<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use App\Task;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //The user must be logged in to access this page
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All tasks
    public function index(){
        $tasks = Task::get();
        $categories = DB::table('budget_categories');

        return view('planning.index', compact("tasks", "categories"));
    }

    //A task details
    public function show(Task $task){
        //Finding the task category and passing it to the view
        $category = BudgetCategory::findOrFail($task->category_id);
        $category_value = $category->category_name;

        return view('planning.show', compact("task", "category_value"));
    }

    //Create a new task
    public function create(){
        $categories = BudgetCategory::all()->pluck('category_name', 'id');

        return view('planning.create', compact("categories"));
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
        $categories = BudgetCategory::all()->pluck('category_name', 'id');

        return view('planning.edit', compact("task", "categories"));
    }

    //Updating an existing task
    public function update(Request $request, $task){
        $formData = $request->all();
        $task = Task::findOrFail($task);
        $task->update($formData);

        return redirect('planning');
    }

    //Delete a task
    public function destroy($task){
        Task::destroy($task);
        return redirect('planning');
    }
}
