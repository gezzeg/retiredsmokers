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
      }