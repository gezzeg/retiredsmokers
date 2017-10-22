@extends('layouts.master')

@section('title', 'Edit Location')


@section('content')


<div class="row">

@include('profiles.shared.side')
  
  <div class="col-md-9">
    
    <div class="panel panel-default">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Location Show : {{ $user->first_name }}</h3>

      </div>
      <div class="panel-body">

      <form id="myForm" action="" method="post">

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

        <tr><td>City</td><td>:</td><td><input type="text" name="city" class="form-control" id="city"placeholder="City" value="{{ $user->profile->city }}"></td></tr>

        <tr><td>State</td><td>:</td><td><input type="text" name="state" class="form-control" id="state"placeholder="State" value="{{ $user->profile->state }}"></td></tr>

        <tr><td>Country</td><td>:</td><td><input type="text" name="country" class="form-control" id="country" placeholder="Country" value="{{ $user->profile->country }}"></td></tr>

        <tr><td>Postcode</td><td>:</td><td><input type="text" name="postcode" class="form-control" id="postcode" placeholder="Postcode" value="{{ $user->profile->postcode }}"></td></tr>

{{--
        <tr><td>City</td><td>:</td><td><input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ $user->profile->city }}"></td></tr> 
        <!-- <tr><td>City</td><td>:</td><td>{{ $user->profile->city }}</td></tr> -->


        <tr><td>Country</td><td>:</td><td><input type="text" name="country" class="form-control" id="country" placeholder="Country" value="{{ $user->profile->country }}"></td></tr>

        <tr><td>Postcode</td><td>:</td><td><input type="text" name="postcode" class="form-control" id="postcode" placeholder="Postcode" value="{{ $user->profile->postcode }}"></td></tr>
 --}}        

      </table>

      <a href="{{ url('/profile') }}" class="btn btn-primary  pull-right" style="margin-right:5px;margin-left: 5px" title="">Back</a>

      <BUTTON class="btn btn-primary pull-right" role="button">Save</BUTTON>
    
  
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
                //console.log(place.geometry.location.lat(),place.geometry.location.lng()); 
                //
                var lat=place.geometry.location.lat();
                var lng=place.geometry.location.lng();

                document.getElementById("lat").value=lat;
                document.getElementById("lng").value=lng;

                var geocoder = new google.maps.Geocoder;
                geocodeLatLng(geocoder,lat,lng);
                
            }



            map.fitBounds(bounds);
            map.setZoom(15);
        });

    google.maps.event.addListener(marker, 'dragend', function (event) {
      
            
            var lat=event.latLng.lat();
            var lng=event.latLng.lng();
            
            
            $('#myForm').trigger("reset");

            document.getElementById("lat").value=lat;
            document.getElementById("lng").value=lng;

              //document.getElementById("city").value=getAddress(lat, lng);
              
              var geocoder = new google.maps.Geocoder;

              geocodeLatLng(geocoder,lat,lng);
            
    });


}

function geocodeLatLng(geocoder,lt,ln) {
/*
Reference
https://developers.google.com/maps/documentation/javascript/geocoding
https://developers.google.com/maps/documentation/javascript/examples/geocoding-reverse
https://stackoverflow.com/questions/6359995/get-city-from-geocoder-results
 */
  

  var latlng = {lat: parseFloat(lt), lng: parseFloat(ln)};

  geocoder.geocode({'location': latlng}, function(results, status) {
   
    if (status == google.maps.GeocoderStatus.OK) {
      
      if (results[0]) {
        
        var arrAddress =results[0].address_components;

     // var arrAddress = item.address_components;
        var itemRoute="";
        var itemCity="";
        var itemCountry="";
        var itemState="";
        var itemPostcode="";

        // iterate through address_component array
        $.each(arrAddress, function (i, address_component) {
            //console.log('address_component:'+i);

            if (address_component.types[0] == "locality"){
                console.log("City:"+address_component.long_name);
                itemCity = address_component.long_name;
                document.getElementById("city").value=itemCity;
            }

            if (address_component.types[0] == "administrative_area_level_1"){ 
                console.log("State:"+address_component.long_name);  
                itemState = address_component.long_name;
                document.getElementById("state").value=itemState;

            }

            if (address_component.types[0] == "country"){ 
                console.log("Country:"+address_component.long_name); 
                itemCountry = address_component.long_name;
                document.getElementById("country").value=itemCountry;
            }


            if (address_component.types[0] == "postal_code"){ 
              console.log("Postcode:"+address_component.long_name);  
              itemPostcode = address_component.long_name;
             // if(itemPostcode)
                document.getElementById("postcode").value=itemPostcode;
              // else
              //   document.getElementById("postcode").value="";
            }
            //return false; // break the loop   
        });

        
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}


google.maps.event.addDomListener(window, 'load', searchBox)

</script>


{{-- https://maps.googleapis.com/maps/api/geocode/json?latlng=3.7636857,103.2193674&key=AIzaSyCk_yLQl_qkyq0uV7VzksgQ1-D3GM0q1b8 --}}
  

 



      @endsection