<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PointsRequest;
use App\Models\Point;
use App\Models\User;
use App\Models\Location;
use App\Models\Project;
use App\Models\Events;

use Carbon\Carbon;
class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all();
        return view('point.index',compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $point = new Point;
        $users = User::pluck('name','id');
        $events = Events::pluck('name','name');
        $locations = Location::pluck('name','id');
        $projects = Project::pluck('name','id');
        return view('point.edit', ['point'=>$point,
            'users'=>$users,
            'projects'=>$projects,
            'locations'=>$locations,
            'events'=>$events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointsRequest $request)
    {
        $dt = Carbon::now();
        
        $point = new Point;
        $point->id = $this->generateId($request->event_name, $dt);
        $point->date = $dt->toDateString(); 
        $point->time = $dt->toTimeString();
        $point->longitude = $request->longitude;
        $point->latitude = $request->latitude;
        $point->location_id = $request->location_id;
        $point->project_id = $request->project_id;
        $point->event_name = $request->event_name;
        $point->user_id = $request->user_id; 
        $point->save();
        return redirect("/points")->with('success_message', 'The point has been successfully saved.');
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
        $point = Point::findOrFail($id);
        $users = User::pluck('name','id');
        $events = Events::pluck('name','name');
        $locations = Location::pluck('name','id');
        $projects = Project::pluck('name','id');
        return view('point.edit',['point'=>$point,
            'users'=>$users,
            'projects'=>$projects,
            'locations'=>$locations,
            'events'=>$events]);
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
        $point = Point::findOrFail($id);
        $point->longitude = $request->longitude;
        $point->latitude = $request->latitude;
        $point->location_id = $request->location_id;
        $point->project_id = $request->project_id;
        $point->user_id = $request->user_id; 
        $point->fill($point->getFillable());
        $point->save();
        return redirect(action('PointsController@edit', $point->id))->with('status', 'The point '.$point->id.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Point::findOrFail($id)->delete();
        return redirect('/points')->with('status', 'The Point '.$id.' has been deleted');
    }

    private function generateId($eventName, $dt){

        return $eventName . $dt->format("Ymd"). $dt->format("his");
    }
}
