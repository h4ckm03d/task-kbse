@extends('master')
@if ($user->id)
@section('title', 'Edit user')
@else
@section('title', 'Create user')
@endif

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <form class="form-horizontal" method="post">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    @if ($user->id)
                    <legend>Edit user</legend>
                    <div class="form-group">
                        <label for="id" class="col-lg-2 control-label">Id</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="id" name="id" value="{!! $user->id !!}" disabled>
                        </div>
                    </div>
                    @else
                    <legend>Create user</legend>
                    @endif
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{!! $user->name !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/users" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection