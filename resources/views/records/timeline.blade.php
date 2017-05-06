@extends('layouts.master')

@section('title', 'Achievement')


@section('content')

<style type="text/css">


	
.timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}

.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}

.timeline > li {
  margin-bottom: 20px;
  position: relative;
}

.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}

.timeline > li:after {
  clear: both;
}

.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}

.timeline > li:after {
  clear: both;
}

.timeline > li > .timeline-panel {
  width: 46%;
  float: left;
  border: 1px solid #d4d4d4;
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}

.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-left: 15px solid #ccc;
  border-right: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";
}

.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  right: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-left: 14px solid #fff;
  border-right: 0 solid #fff;
  border-bottom: 14px solid transparent;
  content: " ";
}

.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 50%;
  margin-left: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}

.timeline > li.timeline-inverted > .timeline-panel {
  float: right;
}

.timeline > li.timeline-inverted > .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 15px;
  left: -15px;
  right: auto;
}

.timeline > li.timeline-inverted > .timeline-panel:after {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}

.timeline-badge.primary {
  background-color: #2e6da4 !important;
}

.timeline-badge.success {
  background-color: #3f903f !important;
}

.timeline-badge.warning {
  background-color: #f0ad4e !important;
}

.timeline-badge.danger {
  background-color: #d9534f !important;
}

.timeline-badge.info {
  background-color: #5bc0de !important;
}

.timeline-title {
  margin-top: 0;
  color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
  margin-bottom: 0;
}

.timeline-body > p + p {
  margin-top: 5px;
}

.divtrophy {

    width:100%;
}

.trophy{

	    
    color: green;
}

</style>


<div class="row">
  
	<div class="col-md-6">
	    
		<div class="panel panel-success">
		      
			<div class="panel-heading">     
			<h3 class="panel-title">Achievement Timeline</h3>
			</div>
		
			<div class="panel-body">

				<div class="container2">

					<center>
					<i class="fa fa-trophy fa-5x trophy" aria-hidden="true"></i>
					<p>Congratulations!</p>
					</center>
				  
					  <ul class="timeline">




							 @foreach ($records as $record)
<!-- {{ @$record->smokingStatus->name}}-->
								{{-- $record->user->first_name --}}


							    
							      <li {!! ($c = !$c)? "class=\"timeline-inverted\"" : ""!!}>	
							      <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
							      <div class="timeline-panel">
							        <div class="timeline-heading">
							          <h4 class="timeline-title">{{ @$record->smokingStatus->name}}</h4>
							          
							          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$record->date}} </small></p>
							        </div>
							        <div class="timeline-body">
							          <p>{{$record->note}}</p>
							        </div>
							      </div>
							    </li>

							@endforeach
					 

					  </ul>



				</div>

			</div>

		</div>

	</div>	

	  
	  <div class="col-md-6">
	    
	    <div class="panel panel-info">
	      
	      <div class="panel-heading">
	        
	        <h3 class="panel-title">Profile</h3>
	      </div>


	      <div class="panel-body">


	      <table class="table">

	      	<tr><td>Name</td><td></td><td>asdasd</td></tr>

			<tr><td>Smoked Since</td><td></td><td>1980</td></tr>

			<tr><td>Time Smoking</td><td></td><td>37 years </td></tr>

	      </table>
		</div>

	    </div>
		</div>


		 <div class="col-md-6">
	    
	    <div class="panel panel-primary">
	      
	      <div class="panel-heading">
	        
	        <h3 class="panel-title">Achievement Info</h3>
	      </div>


	      <div class="panel-body">


	      <table class="table">

			<tr><td>Latest status</td><td></td><td>Quit</td></tr>

			<tr><td>Quit</td><td></td><td>1 time</td></tr>

			<tr><td>Attempt To Quit</td><td></td><td>5 times</td></tr>

			<tr><td>Last Attempt</td><td></td><td>1 month ago</td></tr>

	      	<tr><td>Withdraw</td><td></td><td>2 times</td></tr>


	      </table>
		</div>

	    </div>
		</div>

	</div> <!--end row-->




      @endsection