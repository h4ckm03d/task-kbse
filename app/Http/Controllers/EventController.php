<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
  public function index() {
    $events = Events::all();
    return $this->view('events.list', compact('events'));
  }

  public function create() {
    $events = new Events;
    return $this->view('events.edit', compact('events'));
  }

  public function store() {
    $events = new Events;
    $events->fill($events->getFillable());
    $events->save();
    return redirect()->route('events.index')->with('success_message', 'The events has been successfully saved.');
  }

  public function edit($id) {
    $events = Events::findOrFail($id);
    return $this->view('events.edit', compact('events'));
  }

  public function update($id) {
    $events = Events::findOrFail($id);
    $events->fill($events->getFillable());
    $events->save();
    return redirect()->route('events.index')->with('success_message', 'The events has been successfully saved.');
  }

  public function destroy($id) {
    Events::findOrFail($id)->delete();
    return redirect()->route('events.index')->with('success_message', 'The events has been successfully deleted.');
  }
}