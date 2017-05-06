@extends('layouts.master')

@section('title', 'Location Show')


@section('content')


<div class="row">


  
  <div class="col-md-12">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Location Show : {{ $user->first_name }}</h3>

      </div>
      <div class="panel-body">

      <form action="" method="post">

      {{ csrf_field() }}


      @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

      @if(session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
      @endif

     
      <div style="height: 300px; width: 100%;padding:10px;" class="map" id="map">
    <!--  <div style="height: 300px; width: 100%;padding:10px;" class="map2" id="map2">
        -->
      
        {!!Mapper::renderJavascript()!!}

      </div>
    


      <table class="table">
        <tr><th>Title</th><th>:</th><th>Desc</th></tr> 


        <tr><td>Search Location</td><td>:</td><td><input type="text" name="Search Map" class="form-control" id="searchmap" placeholder="Search Location"></td></tr>
        
        
        <tr><td>Lat</td><td>:</td><td><input type="text" name="lat" class="form-control" id="lat" placeholder="Latitude" value="{{ $user->profile->lat }}"></td></tr>

        <tr><td>Lng</td><td>:</td><td><input type="text" name="lng" class="form-control" id="lng"placeholder="Longitude" value="{{ $user->profile->lng }}"></td></tr>

{{--
        <tr><td>City</td><td>:</td><td><input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ $user->profile->city }}"></td></tr> 
        <!-- <tr><td>City</td><td>:</td><td>{{ $user->profile->city }}</td></tr> -->


        <tr><td>Country</td><td>:</td><td><input type="text" name="country" class="form-control" id="country" placeholder="Country" value="{{ $user->profile->country }}"></td></tr>

        <tr><td>Postcode</td><td>:</td><td><input type="text" name="postcode" class="form-control" id="postcode" placeholder="Postcode" value="{{ $user->profile->postcode }}"></td></tr>
 --}}        

      </table>


      <BUTTON class="btn btn-primary pull-right" role="button">UPDATE</BUTTON>
      

      </form>

      </div>

    </div>


  </div>



</div>


<script>
// google.maps.event.addDomListener(window, 'load', function () {
function searchBox() {
  
var map = new google.maps.Map(document.getElementById('map'),{

center: {
lat:{{ $user->profile->lat or '3.7634' }},
lng:{{ $user->profile->lng or '103.2202' }}
}, 
zoom:15
});

var marker = new google.maps.Marker({
  position: {
lat:{{ $user->profile->lat or '3.7634' }},
lng:{{ $user->profile->lng or '103.2202' }}
},
map:map,
      
      draggable:true
  });


var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });

    google.maps.event.addListener(marker, 'dragend', function (event) {
      
            
            var lat=event.latLng.lat();
            var lng=event.latLng.lng();

            document.getElementById("lat").value=lat;
            document.getElementById("lng").value=lng;

    document.getElementById("city").value=getAddress(lat, lng);
            
    });


}


google.maps.event.addDomListener(window, 'load', searchBox)

</script>



  

 



      @endsection