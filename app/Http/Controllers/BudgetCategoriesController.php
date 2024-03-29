<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use App\Task;
use Illuminate\Http\Request;

class BudgetCategoriesController extends Controller
{
    //The user must be logged in to access this page
    public function __construct()
    {
        //Forcing the user to login before they can access any of the controller's routes
        $this->middleware('auth');
    }

    //All categories
    public function index(){
        $categories = BudgetCategory::paginate(6);

        return view('categories.index', compact("categories"));
    }

    //A category details
    public function show(BudgetCategory $category){
        $tasks = Task::where('budget_category_id', $category->id)->first();
        return view('categories.show', compact("category", "tasks"));
    }

    //Create a new category
    public function create(){
        return view('categories.create');
    }

    //Storing a new category
    public function store(Request $request){
        $category = new BudgetCategory($request->all());
        $category->save();

        //Task::create($task);
        return redirect('categories');
    }

    //Editing an existing category
    public function edit($category){
        $category = BudgetCategory::findOrFail($category);
        return view('categories.edit', compact("category"));
    }

    //Updating an existing category
    public function update(Request $request, $category){
        $formData = $request->all();
        $category = BudgetCategory::findOrFail($category);
        $category->update($formData);

        return redirect('categories');
    }

    //Delete a category
    public function destroy(BudgetCategory $category){
        $category->tasks()->delete();
        $category->delete();
        return redirect('categories');
    }
}
