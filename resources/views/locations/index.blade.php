@extends('layouts.master')

@section('title', 'Show Locations')


@section('content')


<div class="row">
  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">All Locations : </h3>

      </div>
      <div class="panel-body">

      <table class="table">
        <tr><th>#</th><th>User Name</th><th>Lat</th><th>Long</th></tr> 

        <?php $i = 1 ?>
        @foreach ($users as $user)
        <tr>
          <td>{{ $i }}</td><td><a href="location/{{ $user->id }}">{{ $user->first_name }} </a></td>
          <td>{{ $user->profile->lat }}</td>
          <td>{{ $user->profile->lng }}</td>
        </tr>
        <?php $i++ ?>
        @endforeach

      </table>

      </div>

    </div>


  </div>


  

</div>



      @endsection