@extends('layouts.master')

@section('title', 'Login')


@section('content')


<div class="row">
  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Reset Password</h3>

      </div>
      <div class="panel-body">
        
        <form action="" method="POST">

          {{csrf_field()}}

      @if (count ($errors) > 0)
       <div class="alert alert-danger">
           <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
          </ul>  
       </div>
      @endif

      @if(session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
                </div>
            @endif

          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

              <input type="password" name="password" class="form-control" placeholder="Password" required>

            </div>


          </div>
          
          <div class="form-group">
            
            <div class="input-group">
              
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

              <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>

            </div>


          </div>


          <div class="form-group">
            
  
            

              <input type="submit" name="submit" value="Update Password" class="btn btn-success pull-right">
             

           


          </div>

         
        </form>


      </div>

    </div>

  </div>

</div>



  

 



      @endsection