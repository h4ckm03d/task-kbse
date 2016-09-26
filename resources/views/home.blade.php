@extends('master')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div id="map"></div>
        </div>
    </div>

<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwlCwtetUjkqr9K4tzduGPUAfO0ubMAeA&callback=initMap"
    async defer></script>
@endsection