@extends('master')
@section('title', 'View all project')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Users </h2>
                </div>
                <a href="/users/create" class="btn btn-primary">Add</a>
                @if ($users->isEmpty())
                    <p class="empty"> There is no Projects.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $project)
                                <tr>
                                    <td>{!! $project->name !!}</td>
                                    <td><a href={!! action('UsersController@edit', ['id' => $project->id]) !!} class="btn btn-info btn-xs">Edit</a>
                                        <form method="post" action="{!! action('UsersController@destroy', $project->id) !!}" class="pull-left">
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