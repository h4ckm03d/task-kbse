<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\LocationsRequest;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $locations = Location::all();
       return view('location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = new Location;
        return view('location.edit', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationsRequest $request)
    {
        $location = new Location;
        $location->name = $request->name;
        $location->fill($location->getFillable());
        $location->save();
        return redirect("/locations")->with('success_message', 'The location has been successfully saved.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, LocationsRequest $request)
    {
        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->fill($location->getFillable());
        $location->save();
        return redirect(action('LocationsController@edit', $location->id))->with('status', 'The location '.$id.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::findOrFail($id)->delete();
        return redirect('/locations')->with('status', 'The location '.$id.' has been deleted!');
    }
}
