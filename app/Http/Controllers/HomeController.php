<?php

namespace App\Http\Controllers;

use App\SavedVendor;
use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$tasks = Task::all()->where("user_id", Auth::user()->id)->first(5);
        $tasks = Task::all()->take(5);
        $vendors = SavedVendor::all()->take(5);
        //$exploreCategories = ;
        return view('home', compact("tasks", "vendors"));
    }
}
