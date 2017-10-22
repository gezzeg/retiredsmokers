<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Navbar Template for Bootstrap</title>


    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="{!! asset('bootstrap-3.3.7/css/bootstrap.min.css') !!}">

<!-- Optional theme -->
<link rel="stylesheet" href="{!! asset('bootstrap-3.3.7/css/bootstrap-theme.min.css') !!}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="{!! asset('bootstrap-3.3.7/js/bootstrap.min.js') !!}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{!! asset('bootstrap-3.3.7/css/navbar.css') !!}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">RetuiredSmokers.com</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              
            <li role="presentation" {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="{{ url('home')}}">Home</a></li>
            
            <li role="presentation" {{{ (Request::is('about') ? 'class=active' : '') }}}><a href="{{ url('about')}}">About</a></li>
          
            {{-- START ONLY ACCESSIBLE BY LOGIN/REGISTERED USER --}}

            @if(Sentinel::check()) 

                <!-- Location -->
              
             
               <!-- 
                <li role="presentation" {{{ (Request::is('location') ? 'class=active' : '') }}}><a href="{{ url('location/'.Sentinel::getUser()->getUserId())}}">Location</a></li>           
              -->

              <li role="presentation" {{{ (Request::is('location') ? 'class=active' : '') }}}><a href="{{ url('location/cluster')}}">Location</a></li>  

              <!--
                <li role="presentation" {{{ (Request::is('map') ? 'class=active' : '') }}}><a href="{{ url('map')}}">Map</a></li>
               -->



                 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i>  {{Sentinel::getUser()->first_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                 
                 <!-- Dashboard -->
                
              <li role="presentation" {{{ (Request::is('dashboard') ? 'class=active' : '') }}}><a href="{{url('dashboard') }}">Dashboard</a></li>  

                <!-- Dashboard -->
                 

                 <!-- Profile -->

                  <li role="presentation" {{{ (Request::is('profile') ? 'class=active' : '') }}}><a href="{{url('profile') }}">Profile</a></li> 


                 <!-- Profile -->

                           <!-- Record -->
                          <li role="presentation" {{{ (Request::is('record') ? 'class=active' : '') }}}><a href="{{ url('record')}}"><i class="glyphicon glyphicon-off"></i> Smoking History</a></li>    
                          <!-- Record -->

                          <li class="divider"></li>
                          <li><a href="#"><i class="glyphicon glyphicon-off"></i> Configuration</a></li>
                          <li class="divider"></li>
                          
                           <!-- Logout -->
                          <li role="presentation">

                          <!-- <span style="float:left;" class="glyphicon glyphicon-off"></span> 
 -->
                          <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"> <i class="glyphicon glyphicon-off"></i> Logout</a>
                         <form id="logout-form" 
                                action="{{ url('/logout') }}" 
                            method="POST" 
                            style="display: none;">
                                        {{ csrf_field() }}
                          </form>
                           </li>
                           <!-- Logout -->

                        </ul>
                      </li>

            @else
 
                <!-- Login -->
                <li role="presentation" {{{ (Request::is('login') ? 'class=active' : '') }}}><a href="{{ url('login')}}">Login</a></li>
            
                <!-- Register -->
                <li role="presentation" {{{ (Request::is('register') ? 'class=active' : '') }}}><a href="{{ url('register')}}">Register</a></li>

            @endif

            {{-- END ONLY ACCESSIBLE BY LOGIN/REGISTERED USER --}}


            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h3>Welcome to</h3>
        <h1>RetiredSmokers.com</h1>
        <p>This is the place where the wonderful journey begins! </p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Join Us  &raquo;</a>
        </p>
      </div>


  <div class="row">
  
      <div class="col-md-3">
        
        <div class="list-group">
             <a href="#" class="list-group-item"><strong>Dashboard</strong></a>
             <a href="#" class="list-group-item"><strong>My Story</strong> <br>Share with others how you quit smoking</a>
            <a href="#" class="list-group-item">Statistics</a>
             <a href="#" class="list-group-item"><strong>The Symtoms</strong><br>Do you have any symtoms after quit smoking?</a>
            <a href="#" class="list-group-item">Maps</a>
           
          </div>

      </div>

      <div class="col-md-9">
           <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title">My Story</h3>
            </div>
            <div class="panel-body">
              
              Home

            <table class="table table-condensed ">
                <thead><tr><th>test</th><th>test</th><th>test</th></tr></thead>
                <tbody>
                  <tr><td>test</td><td>test</td><td>test</td></tr>
                  <tr><td>test</td><td>test</td><td>test</td></tr>
                  <tr><td>test</td><td>test</td><td>test</td></tr>
                </tbody>
              </table>

            </div>

          </div>

        </div>

</div>




    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="{!! asset('bootstrap-3.3.7/js/bootstrap.min.js') !!}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>