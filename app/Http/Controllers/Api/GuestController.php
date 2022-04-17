<?php

namespace App\Http\Controllers\Api;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuestConfirmationController;
use App\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $totalGuests = Guest::all()->count();
        $guests = Guest::paginate(10);
        $relationships_table = Relationship::get();
        $pendingGuests = Guest::paginate(10)->where("status_id", 1);
        $confirmedGuests = Guest::paginate(10)->where("status_id", 2);

        return \Response::json([
            'total_guests' => $totalGuests,
            'guests' => $guests,
            'relationships' => $relationships_table,
            'pending_guests' => $pendingGuests,
            'confirmed_guests' => $confirmedGuests,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Guest
     */
    public function store(Request $request)
    {
        //
        $guest = new Guest($request->all());
        //(new GuestConfirmationController)->process($guest->email_address);

        return Guest::create($request->all());
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
        return Guest::findOrFail($id);
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
        $formData = $request->all();
        $guest = Guest::findOrFail($id);
        $guest->update($formData);
        return $guest;
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
        $guest = Guest::findOrFail($id);
        $guest->delete();
    }
}
