@extends('layouts.master')

@section('title', 'Edit Profile')


@section('content')


<div class="row">
  
  <div class="col-md-12">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Edit Profile : {{ $userProfile->user_id }}</h3>

      </div>
      <div class="panel-body">

      <form method="post">


      @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

      @if(session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
      @endif


      <input type="hidden" name="_token" value="{!! csrf_token() !!}">

      <table class="table">
        <tr><th>Title</th><th>:</th><th>Desc</th></tr> 

         <tr><td>First Name</td><td>:</td><td>

        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $userProfile->user->first_name }}" required>

        </td></tr>

        <tr><td>Last Name</td><td>:</td><td>

        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $userProfile->user->last_name }}" required>

        </td></tr>        
        
        <tr><td>Date Of Birth</td><td>:</td><td>

        <input type="date" name="dob" class="form-control" placeholder="01/01/2017" value="{{ $userProfile->dob }}" required>

        </td></tr>

        
        <tr><td>Have you ever smoked?</td><td>:</td><td>


            
  

            <div class="input-group">
           
                
           <div class="radio">
          <label><input type="radio" name="smoked" value="1" required {{ ($userProfile->smoked == '1')? 'checked' : ''}}>Yes</label>
          </div>     

          <div class="radio">
            <label><input type="radio" name="smoked" value="0" required {{ ($userProfile->smoked == '0')? 'checked' : ''}}>No</label>
          </div>

      

          </div></td></tr>
{{-- 
        <tr><td>Lat</td><td>:</td><td>

        <input type="text" name="lat" class="form-control" placeholder="Latitude" value="{{ $userProfile->lat }}">

        </td></tr>


        <tr><td>Lng</td><td>:</td><td>
          
        <input type="text" name="lng" class="form-control" placeholder="Longitude" value="{{ $userProfile->lng }}">

        </td></tr>

--}}

        <tr><td>City</td><td>:</td><td>

        <input type="text" name="city" class="form-control" placeholder="City" value="{{ $userProfile->city }}">

        </td></tr>
        <tr><td>Country</td><td>:</td><td>

        <input type="text" name="country" class="form-control" placeholder="Country" value="{{ $userProfile->country }}">

        </td></tr>

        <tr><td>Postcode</td><td>:</td><td>

        <input type="text" name="postcode" class="form-control" placeholder="Postcode" value="{{ $userProfile->postcode }}">

        </td></tr>
        <tr><td>Phone</td><td>:</td><td>

        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $userProfile->phone }}">

        </td></tr>

      </table>


      
      <input type="submit" class="btn btn-primary pull-right" name="submit" value="Update">

      </form>

      </div>

    </div>


  </div>

</div>



  

 



      @endsection