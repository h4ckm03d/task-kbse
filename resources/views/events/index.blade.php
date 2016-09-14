@extends('master')
@section('title', 'View all events')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Events </h2>
                </div>
                <a href="/events/create" class="btn btn-primary">Add</a>
                @if ($events->isEmpty())
                    <p> There is no Events.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{!! $event->name !!}</td>
                                    <td>{!! $event->description !!}</td>
                                    <td><a href={!! action('EventsController@edit', ['name' => $event->name]) !!} class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{!! action('EventsController@destroy', $event->name) !!}" class="pull-left">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <div>
                                                    <button type="submit" class="btn btn-warning btn-xs">Delete</button>
                                                </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection