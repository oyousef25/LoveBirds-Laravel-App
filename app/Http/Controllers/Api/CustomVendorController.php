<?php

namespace App\Http\Controllers\Api;

use App\CustomVendor;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CustomVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|CustomVendor[]
     */
    public function index()
    {
        return CustomVendor::paginate(8);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return CustomVendor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CustomVendor::findOrFail($id);
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
        $customVendor = CustomVendor::findOrFail($id);
        $customVendor->update($request->all());
        return $customVendor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customVendor = CustomVendor::findOrFail($id);
        $customVendor->delete();
    }
}
