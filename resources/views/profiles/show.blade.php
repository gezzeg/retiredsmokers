@extends('layouts.master')

@section('title', 'Profile')


@section('content')


<div class="row">

{{-- Error --}}

  <div class="col-md-12">      

      @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
      @endforeach

      @if(session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
      @endif

  </div>

  {{-- $userProfile->user->first_name --}}

  {{-- Error --}}

{{-- Avatar --}}

 {{-- 
 
 <div class="col-md-3">
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Avatar</h3>

      </div>
      <div class="panel-body">
      <!-- <img class="text-center" src="test.jpg" width="100px" height="100px" class="img-circle"> -->
      <img src="{{ url('/')}}/uploads/avatars/{{ $userProfile->avatar }}" style="">
      </div>
    </div>
  </div>  

  --}} 
      
{{-- Avatar --}}

{{--
  <div class="col-md-9">
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Login Details</h3>

      </div>
      <div class="panel-body">
    
     


      <table class="table table-striped table-hover pull-right">
        
        <tr><td>User ID</td><td>:</td><td>{{ $userProfile->user->id}}</td></tr>

        <tr><td>First Name</td><td>:</td><td>{{ $userProfile->user->first_name}}</td></tr>
        <tr><td>Last Name</td><td>:</td><td>{{ $userProfile->user->last_name}}</td></tr>
        <tr><td>Email</td><td>:</td><td>{{ $userProfile->user->email}}</td></tr>
        <tr><td>Membership Since</td><td>:</td><td>{{ $userProfile->user->created_at}}</td></tr>

        
      </table>
 

      <a  class="btn btn-primary pull-right" role="button" href="{{ URL::to('login/'. $userProfile->user_id.'/edit') }}">Edit</a>

      </div>

    </div>


  </div> 

  --}}

  {{-- Profile --}}

  @include('profiles.shared.side')
  
  <div class="col-md-5">
    
    <div class="panel panel-default">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Profile Detail</h3>

      </div>
      <div class="panel-body">
      <p>It is nice to know about you!</p>



      <table class="table table-striped table-hover">
        <tr><th>Title</th><th>:</th><th>Desc</th></tr> 

        {{-- <tr><td>Table Id</td><td>:</td><td>{{ $userProfile->id }}</td></tr>
        <tr><td>User Id</td><td>:</td><td>{{ $userProfile->user_id }}</td></tr> --}}

        <tr><td>First Name</td><td>:</td><td>{{ $userProfile->user->first_name }}</td></tr>
        <tr><td>Last Name</td><td>:</td><td>{{ $userProfile->user->last_name }}</td></tr>  
         <tr><td>Email</td><td>:</td><td>{{ $userProfile->user->email }}</td></tr>      

        <tr><td>Date Of Birth</td><td>:</td><td>{{ $userProfile->dob }}</td></tr>
        <tr><td>Have you ever smoked?</td><td>:</td><td>{{ ($userProfile->smoked)? 'Yes' : 'No' }}</td></tr>
        <tr><td>Do you have experienced withdrawal symptoms?</td><td>:</td><td>{{ ($userProfile->withdrawal)? 'Yes' : 'No' }}</td></tr>
        {{--
        <tr><td>Lat</td><td>:</td><td>{{ $userProfile->lat }}</td></tr>
        <tr><td>Lng</td><td>:</td><td>{{ $userProfile->lng }}</td></tr>
                        --}}

       
        <tr><td>Phone</td><td>:</td><td>{{ $userProfile->phone }}</td></tr>

      </table>


      {{-- <a  class="btn btn-primary pull-right" role="button" href="{{ URL::to('profile/'. $userProfile->user_id.'/edit') }}">Edit</a> --}}

      <a  class="btn btn-primary pull-right" role="button" href="{{ URL::to('profile/edit') }}">Edit</a>

      </div>

    </div>


  </div>

{{-- Profile --}}

 {{-- Location --}}

  <div class="col-md-4">
    
    <div class="panel panel-default">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Location</h3>

      </div>
      <div class="panel-body">

      <p>Let us know where are you from!</p>
      

     
       <div style="height: 300px; width: 100%;padding:10px;" class="map" id="map">
    <!--  <div style="height: 300px; width: 100%;padding:10px;" class="map2" id="map2">
        -->
      
        {!!Mapper::renderJavascript()!!}

      </div>
    

      <table class="table table-striped table-hover">
        <tr><th>Title</th><th>:</th><th>Desc</th></tr> 
        
        
        <tr><td>Lat</td><td>:</td><td>{{ $userProfile->lat }}</td></tr>
        <tr><td>Lng</td><td>:</td><td>{{ $userProfile->lng }}</td></tr>
         <tr><td>City</td><td>:</td><td>{{ $userProfile->city }}</td></tr>
        <tr><td>Country</td><td>:</td><td>{{ $userProfile->country }}</td></tr>
        <tr><td>Postcode</td><td>:</td><td>{{ $userProfile->postcode }}</td></tr>       

      </table>


      <a  class="btn btn-primary pull-right" role="button" href="{{ URL::to('location/edit') }}">Edit</a>


      </div>

          </div>


        </div>


        <script type="text/javascript">
          
        function GMap() {
          
        var map = new google.maps.Map(document.getElementById('map'),{

        center: {
        lat:{{ $userProfile->user->profile->lat }},
        lng:{{ $userProfile->user->profile->lng }}
        }, 
        zoom:15,
        //mapTypeId: google.maps.MapTypeId.HYBRID
        });

        var marker = new google.maps.Marker({
          position: {
        lat:{{$userProfile->user->profile->lat}},
        lng:{{$userProfile->user->profile->lng}}
        },
        map:map,
              
              draggable:false
          });

        }

        google.maps.event.addDomListener(window, 'load', GMap)

        </script>        
  
{{-- Location --}}

</div>



  

 



      @endsection