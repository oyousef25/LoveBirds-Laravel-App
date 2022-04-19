<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SavedVendor;
use App\User;
use Illuminate\Http\Request;

class SavedVendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SavedVendor::paginate(8);
    }

    public function filter($email)
    {
        //get the passed user
        $currentUser = User::where("email", $email)->first();

        return SavedVendor::where("user_id", $currentUser->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return SavedVendor::create($request->all());
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
        return SavedVendor::findOrFail($id);
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
        $savedVendor = SavedVendor::findOrFail($id);
        $savedVendor->delete();
    }
}
