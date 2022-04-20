<?php

namespace App\Http\Controllers\Api;

use App\BudgetCategory;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(8);
        $categories = BudgetCategory::get();

        $totalSpent = Task::get()->sum('task_price');

        return \Response::json([
            'tasks' => $tasks,
            'categories' => $categories,
            'total_spent' => $totalSpent
        ]);
    }

    public function filter($email)
    {
        //get the passed user
        $currentUser = User::where("email", $email)->first();

        if($currentUser->partner_email != null){
            $userPartner = User::where('email', $currentUser->partner_email)->first();
        }else{
            $userPartner = new User();
        }

        $userTasks = Task::where("user_id", $currentUser->id)->get();
        $partnerTasks = Task::where("user_id", $userPartner->id)->get();
        $allTasks = $userTasks->merge($partnerTasks);

        $categories = BudgetCategory::get();

        $totalSpent = $allTasks->sum('task_price');
        $budgetTotal = $currentUser->budget + $userPartner->budget;

        return \Response::json([
            'all_tasks' => $allTasks,
            'user_tasks' => $userTasks,
            'partner_tasks' => $partnerTasks,
            'categories' => $categories,
            'total_spent' => $totalSpent,
            'budget_total' => $budgetTotal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return Task::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Task::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::findOrFail($id);
        $task->update($request->all());
        $task->save();
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
