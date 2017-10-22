@extends('layouts.master')

@section('title', '')


@section('content')



 <div class="row">
  
      <div class="col-md-3">


      	@include('members.shared.side')  
        

      </div>

      <div class="col-md-3">
      	<div class="panel panel-default">
      		<div class="panel-heading">
      			<div class="panel-title">
      				Total Members
      			</div>
      		</div>
          <div class="panel-body text-center">
            <span class="glyphicon glyphicon-user " style="font-size: 50px;"></span>
      			<h1>{{ \App\User::All()->count() }}</h1>
      		</div>
      	</div>
      </div>

      <div class="col-md-3">
      	<div class="panel panel-default">
      		<div class="panel-heading">
      			<div class="panel-title">
      				Total Quit Smoking
      			</div>
      		</div>
      		<div class="panel-body text-center">
      			<span class="glyphicon glyphicon-star" style="font-size: 50px;"></span>
            <h1>{{ \App\User::All()->count() }}</h1>
      		</div>
      	</div>
      </div>

      <div class="col-md-3">
      	<div class="panel panel-default">
      		<div class="panel-heading">
      			<div class="panel-title">
      				Story Publish
      			</div>
      		</div>
      		<div class="panel-body text-center">
            <span class="glyphicon glyphicon-list-alt" style="font-size: 50px;"></span>
            <h1>{{ \App\Post::whereStatus('publish')->count() }}</h1>
      		</div>
      	</div>
      </div>

      <div class="col-md-9">
           <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title">World Of RetiredSmokers!</h3>
            </div>
            
              
             <div id="map" style="height: 400px;
        width: 100%;"></div>

            

          </div>



        </div>

</div>

<script>
      function initMap() {
        // var uluru = {lat: 3.1390030, lng: 101.6870696};
        // var map = new google.maps.Map(document.getElementById('map'), {
        //   zoom: 1,
        //   center: uluru
        // });
        // var marker = new google.maps.Marker({
        //   position: uluru,
        //   map: map
        // });
        
 
       var center = new google.maps.LatLng({{$you->profile->lat}}, {{$you->profile->lng}});

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 2,
         center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles:[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]

        });

        var markers2 = [

        @foreach($users as $user)

        ['{{$user->first_name}}',{{$user->profile->lat}},{{$user->profile->lng}}],

      @endforeach

        ];

        var markers3 = [
        [51.5074, 10.1278],
        [51.5074, 20.1278],
        [51.5074, 30.1278],
        [51.5074, 40.1278],
        [51.5074, 50.1278],

        ];

        // Info window content
        var infoWindowContent = [

        @foreach($users as $user)

          ['{{$user->first_name}}'],

        @endforeach
       
        ];

        var markers=[], i, infoWindow = new google.maps.InfoWindow();




        // Place each marker on the map  
      for( i = 0; i < markers2.length; i++ ){
      
           var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers2[i][1], markers2[i][2]),
                title: markers2[i][0]
            });
            
            markers.push(marker);

             // Add info window to marker    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    //infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.setContent(markers2[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
        
        }
        
  



        var options = {
            imagePath: '{{ URL::to('/')}}/js/googlemap/cluster/images/m'
        };

        var markerCluster = new MarkerClusterer(map, markers, options); 

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk_yLQl_qkyq0uV7VzksgQ1-D3GM0q1b8&callback=initMap">
    </script>

      @endsection