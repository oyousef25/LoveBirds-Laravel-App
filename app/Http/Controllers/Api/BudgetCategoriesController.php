<?php

namespace App\Http\Controllers\Api;

use App\BudgetCategory;
use App\Http\Controllers\Controller;
use App\SavedVendor;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class BudgetCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BudgetCategory::all();
    }

    public function filter($email)
    {
        //get the passed user
        $currentUser = User::where('email', $email);

        return BudgetCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = new BudgetCategory($request->all());
        $category->save();

        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = BudgetCategory::findOrFail($id);
        $tasks = Task::where('budget_category_id', $id)->get();
        return \Response::json([
            'category' => $category,
            'tasks' => $tasks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = BudgetCategory::findOrFail($id);
        $category->update($request->all());
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = BudgetCategory::findOrFail($id);
        $category->delete();
    }
}
