@extends('master')
@section('title', 'View all points')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Points </h2>
                </div>
                <a href="/points/create" class="btn btn-primary">Add</a>
                @if ($points->isEmpty())
                    <p class="empty"> There is no Points.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Point ID</th>
                                <!-- <th>Date</th>
                                 <th>Time</th> -->
                                <th>Project</th>
                                <th>Location</th>
                                <th>Long</th>
                                <th>Lat</th>
                                <th>Event</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($points as $point)
                                <tr>
                                    <td>{!! $point->id !!}</td>
                                    <!-- <td>{!! $point->date !!}</td>
                                    <td>{!! $point->time !!}</td> -->
                                    <td>{!! $point->project->name !!}</td>
                                    <td>{!! $point->location->name !!}</td>
                                    <td>{!! $point->longitude !!}</td>
                                    <td>{!! $point->latitude !!}</td>
                                    <td>{!! $point->event_name !!}</td>
                                    <td>{!! $point->user->name !!}</td>
                                    <td><a href={!! action('PointsController@edit', ['id' => $point->id]) !!} class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        <form method="post" action="{!! action('PointsController@destroy', $point->id) !!}" class="pull-left">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <div>
                                                    <button type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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