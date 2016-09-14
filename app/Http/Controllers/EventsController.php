<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
  public function index() {
    $events = Events::all();
    return view('events.index', compact('events'));
  }

  public function create() {
    $event = new Events;
    return view('events.create', compact('event'));
  }

  public function store(Request $request) {
    $events = new Events;
    $events->name = $request->name;
    $events->description = $request->description;
    $events->fill($events->getFillable());
    $events->save();
    return redirect("/events")->with('success_message', 'The events has been successfully saved.');
  }

  public function edit($name) {
    $events = Events::findOrFail($name);
    return view('events.edit', ['event'=> $events]);
  }

  public function update($name, Request $request) {
    $event = Events::findOrFail($name);
    $event->description = $request->description;
    $event->fill($event->getFillable());
    $event->save();
    return redirect(action('EventsController@edit', $event->name))->with('status', 'The event '.$name.' has been updated!');
  }

  public function destroy($name) {
    Events::findOrFail($name)->delete();
    return redirect('/events')->with('status', 'The event '.$name.' has been deleted!');
  }
}