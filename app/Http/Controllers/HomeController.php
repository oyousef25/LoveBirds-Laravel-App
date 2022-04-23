<?php

namespace App\Http\Controllers;

use App\SavedVendor;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $currentUser = Auth::user();
        //$tasks = Task::all()->where("user_id", Auth::user()->id)->first(5);
        $tasks = Task::where('user_id', Auth::user()->id)->paginate(4);
        $vendors = SavedVendor::where('user_id', Auth::user()->id)->paginate(4);
        //$exploreCategories = ;
        return view('home', compact("tasks", "vendors"));
    }
}
