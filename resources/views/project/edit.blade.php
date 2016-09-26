@extends('master')
@if ($project->id)
@section('title', 'Edit project')
@else
@section('title', 'Create project')
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
                    @if ($project->id)
                    <legend>Edit project</legend>
                      <div class="form-group">
                        <label for="id" class="col-lg-2 control-label">Id</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="id" name="id" value="{!! $project->id !!}" disabled>
                        </div>
                    </div>
                    @else
                    <legend>Create project</legend>
                    @endif
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{!! $project->name !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/projects" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection