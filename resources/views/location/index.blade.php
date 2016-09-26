@extends('master')
@section('title', 'View all location')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Locations </h2>
                </div>
                <a href="/locations/create" class="btn btn-primary">Add</a>
                @if ($locations->isEmpty())
                    <p> There is no Locations.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{!! $location->name !!}</td>
                                    <td><a href={!! action('LocationsController@edit', ['id' => $location->id]) !!} class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{!! action('LocationsController@destroy', $location->id) !!}" class="pull-left">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <div>
                                                    <button type="submit" class="btn btn-warning btn-xs" on>Delete</button>
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