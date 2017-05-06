@extends('layouts.master')

@section('title', 'Location Show')


@section('content')


<div class="row">


  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Location Show : {{ $user->first_name }}</h3>

      </div>
      <div class="panel-body">


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
         <tr><td>Profile Id</td><td>:</td><td>{{ $user->profile->user_id }}</td></tr>
        
        <tr><td>Lat</td><td>:</td><td>{{ $user->profile->lat }}</td></tr>
        <tr><td>Lng</td><td>:</td><td>{{ $user->profile->lng }}</td></tr>
        <tr><td>City</td><td>:</td><td>{{ $user->profile->city }}</td></tr>
        <tr><td>Country</td><td>:</td><td>{{ $user->profile->country }}</td></tr>
        <tr><td>Postcode</td><td>:</td><td>{{ $user->profile->postcode }}</td></tr>
        

      </table>


      <a  class="btn btn-primary pull-right" role="button" href="{{ URL::to('location/'. $user->profile->user_id.'/edit') }}">Edit</a>

      </div>

    </div>


  </div>



</div>


<script type="text/javascript">
  
function GMap() {
  
var map = new google.maps.Map(document.getElementById('map'),{

center: {
lat:{{ $user->profile->lat }},
lng:{{ $user->profile->lng }}
}, 
zoom:15,
//mapTypeId: google.maps.MapTypeId.HYBRID
});

var marker = new google.maps.Marker({
  position: {
lat:{{ $user->profile->lat }},
lng:{{ $user->profile->lng }}
},
map:map,
      
      draggable:false
  });

}

google.maps.event.addDomListener(window, 'load', GMap)

</script>
  

 



      @endsection