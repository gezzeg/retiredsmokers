@extends('layouts.master')

@section('title', 'Show Profile')


@section('content')


<div class="row">
  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">All Profile : </h3>

      </div>
      <div class="panel-body">

      <table class="table">
        <tr><th>#</th><th>User Name</th></tr> 

        <?php $i = 1 ?>
        @foreach ($users as $user)
        <tr><td>{{ $i }}</td><td><a href="profile/{{ $user->id }}">{{ $user->first_name }} </a></td></tr>
        <?php $i++ ?>
        @endforeach

      </table>

      </div>

    </div>


  </div>

</div>



      @endsection