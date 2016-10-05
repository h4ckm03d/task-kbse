@extends('master')
@if ($point->id)
@section('title', 'Edit points')
@else
@section('title', 'Create points')
@endif

@section('content')

    <div class="container">
        <div class="content">
            <div id="map"></div>
        </div>
    </div>
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
                    @if ($point->id)
                    <legend>Edit point</legend>
                      <div class="form-group">
                        <label for="id" class="col-lg-2 control-label">Id</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="id" name="id" value="{!! $point->id !!}" disabled>
                        </div>
                    </div>
                    @else
                    <legend>Create point</legend>
                    @endif
                    <div class="form-group">
                        <label for="longitude" class="col-lg-2 control-label">Longitude</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="longitude" step="0.01" max="180" min="-180" name="longitude" value="{!! $point->longitude !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="latitude" class="col-lg-2 control-label">Latitude</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="latitude" step="0.01" max="90" min="-90" name="latitude" value="{!! $point->latitude !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project_id" class="col-lg-2 control-label">Project</label>
                        <div class="col-lg-10">
                        {!! Form::select('project_id', $projects, $point->project_id, ['class' =>
                            'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location_id" class="col-lg-2 control-label">Location</label>
                        <div class="col-lg-10">
                        {!! Form::select('location_id', $locations, $point->location_id, ['class' =>
                            'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="event_name" class="col-lg-2 control-label">Events</label>
                        <div class="col-lg-10">
                        {!! Form::select('event_name', $events, $point->event_name, ['class' =>
                            'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="user_id" class="col-lg-2 control-label">User</label>
                        <div class="col-lg-10">
                        {!! Form::select('user_id', $users, $point->user_id, ['class' =>
                            'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/points" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script>
      function rounded(x){
          return Math.round(x*100)/100;
      }
      var map, marker;
      function placeMarker(location) {
          var lng = rounded(parseFloat(location.lng()));
          var lat = rounded(parseFloat(location.lat()));
          $("#longitude").val(lng);
          $("#latitude").val(lat);
          marker.setPosition( location );
          map.setCenter(location);
      }

      function initMap() {
        var lng = rounded(parseFloat($("#longitude").val()));
        var lat = rounded(parseFloat($("#latitude").val()));
        console.log(lat, lng);
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: lat, lng: lng},
          zoom: 8
        });

        marker = new google.maps.Marker({
          position: {lat: lat, lng: lng},
          map: map,
          title: 'I\'m here'
        });
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwlCwtetUjkqr9K4tzduGPUAfO0ubMAeA&callback=initMap"
    async defer></script>
@endsection