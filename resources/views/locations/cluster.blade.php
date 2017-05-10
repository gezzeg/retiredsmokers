<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Searchbox</title>

@if(Route::is('locationCluster'))
    <link href="{{ asset('css/clusterstyle.css') }}" media="all" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="{!! asset('js/googlemap/cluster/src/markerclusterer.js') !!}"></script>
@endif     

   
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    

<style>
  
   #over_map { 
    position: absolute; 
    background-color: white;
    top: 10px; 
    left: 10px; 
    z-index: 99; 
   
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  }

  #panel{
     margin: 10px;
    padding: 10px;
    padding:10px;
  }

 

</style>
  </head>
  <body>
   
<input id="pac-input" class="controls" type="text" placeholder="Search Box"> <input type="button" name="button" value="button"/>
    
    <div id="map"></div>
  


    <div id="over_map">
      <div id="panel">
        <h3>HEADER</h3>
        <input id="" type="text" placeholder="Search Box"> 
      </div>
    </div>



    <script>


    $(function(){
    $( "#over_map" ).draggable();
  } );
   




      function initMap() {


     

    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
    	zoom:2,
        mapTypeId: 'roadmap',
        styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#ffdfa6"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#b52127"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#c5531b"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#74001b"},{"lightness":-10}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#da3c3c"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#74001b"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#da3c3c"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#990c19"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#74001b"},{"lightness":-8}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#6a0d10"},{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#ffdfa6"},{"weight":0.4}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]}]

    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [

    	@foreach($users as $user)

    	['{{$user->first_name}}',{{$user->profile->lat}},{{$user->profile->lng}}],

    	@endforeach

       /* ['Brooklyn Museum, NY', 40.671531, -73.963588],
        ['Brooklyn Public Library, NY', 40.672587, -73.968146],
        ['Prospect Park Zoo, NY', 40.665588, -73.965336],
        ['Kuantan',3.7633430771966627,103.21979656190183]*/
    ];
                        
    // Info window content
    var infoWindowContent = [

    	@foreach($users as $user)

    	['{{$user->first_name}}'],

    	@endforeach
       
       
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {this.setZoom(2);google.maps.event.removeListener(boundsListener);
    });

    
}

function initialize() {
       var center = new google.maps.LatLng(0.0, 0.0);

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
        
        /*

         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.5074, 10.1278)
        });
        markers.push(marker);

         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.5074, 20.1278)
        });
        markers.push(marker);
         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.5074, 30.1278)
        });
        markers.push(marker);
         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.5074, 40.1278)
        });
        markers.push(marker);
         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.5074, 50.1278)
        });
        markers.push(marker);

        */




        var options = {
            imagePath: '{{ URL::to('/')}}/js/googlemap/cluster/images/m'
        };

        var markerCluster = new MarkerClusterer(map, markers, options); 

//SEARCHBOX START///////////////////////////////////////////////////////////////////
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
         
            /*
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
             title: place.name,
              position: place.geometry.location
            })); */

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
//SEARCHBOX END///////////////////////////////////////////////////////////////////        
    } 




// Load initialize function
//google.maps.event.addDomListener(window, 'load', initMap);
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk_yLQl_qkyq0uV7VzksgQ1-D3GM0q1b8&libraries=places&callback=initialize"
         async defer></script>
  </body>
</html>