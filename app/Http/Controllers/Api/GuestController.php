<?php

namespace App\Http\Controllers\Api;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuestConfirmationController;
use App\Relationship;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    protected $currentUser = "";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $totalGuests = Guest::all()->count();
        $guests = Guest::all();
        $relationships_table = Relationship::get();
        $pendingGuests = DB::table('guests')->where("status_id", 1)->get();
        $confirmedGuests = DB::table('guests')->where("status_id", 2)->get();

        return \Response::json([
            'total_guests' => $totalGuests,
            'guests' => $guests,
            'relationships' => $relationships_table,
            'pending_guests' => $pendingGuests,
            'confirmed_guests' => $confirmedGuests
        ]);
    }

    public function filter($email)
    {
        //get the passed user
        $currentUser = User::where("email", $email)->first();
        $this->currentUser = $currentUser;

        $guestQuery = Guest::where("user_id", $currentUser->id);
        $guests = $guestQuery->get();
        $totalGuests = $guests->count();
        $relationships_table = Relationship::get();
        $pendingGuests = $guestQuery->where("status_id", 1)->get();
        $confirmedGuests = $guestQuery->where("status_id", 2)->get();

        return \Response::json([
            'total_guests' => $totalGuests,
            'guests' => $guests,
            'relationships' => $relationships_table,
            'pending_guests' => $pendingGuests,
            'confirmed_guests' => $confirmedGuests
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
        (new GuestConfirmationController)->process($guest->email_address, $this->currentUser->email);

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
