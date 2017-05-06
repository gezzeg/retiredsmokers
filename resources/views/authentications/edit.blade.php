@extends('layouts.master')

@section('title', 'Register')


@section('content')


<div class="row">
  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Edit Login</h3>

      </div>
      <div class="panel-body">
        
        <form action="register" method="POST">

          {{csrf_field()}}

          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
    			@endforeach

    			@if(session('status'))
    			<div class="alert alert-success">
          {{ session('status') }}
          </div>
          @endif

          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" name="email" class="form-control" placeholder="{{$loginDetail->email}}" disabled="">

            </div>


          </div>

          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$loginDetail->first_name}}">

            </div>


          </div>

          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$loginDetail->last_name}}">

            </div>


          </div>

<hr />

         <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

              <input type="password" name="old_password" class="form-control" placeholder="Old Password">

            </div>

        </div>    


          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

              <input type="password" name="password" class="form-control" placeholder="Password">

            </div>


          </div>

          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

              <input type="password" name="confirm_password" class="form-control" placeholder="Password Confirmation">

            </div>


          </div>



          <div class="form-group">
            
          
              
            

              <input type="submit" name="submit" value="Update" class="btn btn-success pull-right">
              <!--<button type="submit" class="btn btn-successs">Submit</button>-->

           


          </div>

         
        </form>


      </div>

    </div>


  </div>

</div>



  

 



      @endsection