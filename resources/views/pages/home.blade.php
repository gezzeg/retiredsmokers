@extends('layouts.master')

@section('title', 'Home')


@section('content')



 <div class="jumbotron" style="text-align: center;" >
  <img class="" src="{{ url('/')}}/images/retiredsmokerslogo.png" style="width: 200px; height:200px;">



        <h3>Welcome to</h3>
        <h1>RetiredSmokers.com</h1>
        {{-- <p>We are honour to have you here. Lets the wonderful journey begins! </p> --}}<p>Inspirational . Experienced. Motivated</p>
        <p>
          <a class="btn btn-lg btn-primary" href="{{url('register')}}" role="button">Join Us  &raquo;</a>
        </p>
      </div>


{{-- <h1 class="text-center" style="margin-bottom:30px;">Our Inspirational Story </h1> --}}

<h1 class="text-center" style="font-size:72px; margin-top:70px;margin-bottom:70px;">Features </h1>

<div class="row">
	<div class="col-md-4 text-center">
		
		<span style="font-size:72px;" class="glyphicon glyphicon-globe"></span>
		<h3>Our world.</h3>
		<h4>Join us and map yourself on <br> our world map of quit smokers!</h4>
		
	</div>
	<div class="col-md-4 text-center">
		
		<span style="font-size:72px;" class="glyphicon glyphicon-list-alt"></span>
		<h3>Our Story.</h3>
		<h4>Trying to quit smoking? <br> Get tips and tricks from experienced!</h4>
		
	</div>
	<div class="col-md-4 text-center">

		<span style="font-size:72px;" class="glyphicon glyphicon-thumbs-up"></span>
		<h3>Our Glory.</h3>
		<h4>Whatever purpose you are here. <br> Thank your for your visiting and support.</h4>

	</div>
</div>

<div class="row">
	
	{{-- @foreach($users as $user)
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Story by {{ $user->first_name }}</div>
			</div>
			<div class="panel-body">
				{!! $user->post->content !!}
			</div>
			<div class="panel-footer">


				<button type="button" class="btn btn-md">
	  				<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 123
				</button>

				<button type="button" class="btn btn-md">
	  				<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 123
				</button>	
			
			</div>
		</div>
	</div>
	@endforeach --}}

		

</div>

<br><br><br>

{{-- <h1 class="text-center" style="margin-bottom:30px;">Share Your Experienced </h1> --}}

      @endsection