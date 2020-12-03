<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('home')}}">RetiredSmokers.com</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            
            {{-- <ul class="nav navbar-nav">
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
            </ul> --}}

            <ul class="nav navbar-nav navbar-right">
   
            {{-- START ONLY ACCESSIBLE BY LOGIN/REGISTERED USER --}}

            @if(Sentinel::check()) 


             <li role="presentation" {{{ (Request::is('dashboard') ? 'class=active' : '') }}}><a href="{{ url('dashboard')}}">Dashboard</a></li>
          

                <!-- Location -->
                       
                {{-- <li role="presentation" {{{ (Request::is('location') ? 'class=active' : '') }}}><a href="{{ url('location/'.Sentinel::getUser()->getUserId())}}">Location</a></li>   --}}           

              <li role="presentation" {{{ (Request::is('location') ? 'class=active' : '') }}}><a href="{{ url('location/cluster')}}">Location</a></li>  

              {{-- <li role="presentation" {{{ (Request::is('map') ? 'class=active' : '') }}}><a href="{{ url('map')}}">Map</a></li> --}}

                 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i>  {{ Sentinel::getUser()->first_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                 
                {{--  Dashboard  --}}
                
              {{-- <li role="presentation" {{{ (Request::is('dashboard') ? 'class=active' : '') }}}><a href="{{url('dashboard') }}"><i class="glyphicon glyphicon-dashboard"></i>  Dashboard</a></li>  
 --}}
                {{--  Dashboard  --}}
                 

                {{--  Profile  --}}

                  <li role="presentation" {{{ (Request::is('profile') ? 'class=active' : '') }}}><a href="{{url('profile') }}"><i class="glyphicon glyphicon-user"></i> Profile</a></li> 


                {{--  Profile  --}}

                {{-- Record --}} 
                
                  {{-- <li role="presentation" {{{ (Request::is('record') ? 'class=active' : '') }}}><a href="{{ url('record')}}"><i class="glyphicon glyphicon-star"></i> Smoking History</a></li> --}}                    
                {{-- Record --}} 

                {{-- Symptoms --}}

                  {{-- <li role="presentation" {{{ (Request::is('symptoms') ? 'class=active' : '') }}}><a href="{{ url('symptoms')}}"><i class="glyphicon glyphicon-star"></i> Symptoms</a></li>   --}}  
                
                {{-- Symptoms --}}
                          <li class="divider"></li>
                          
                          <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Configuration</a></li>

                         <li role="presentation" {{{ (Request::is('login/edit') ? 'class=active' : '') }}}><a href="{{ url('login/edit') }}"><i class="glyphicon glyphicon-lock"></i> Reset Password</a></li>

                          <li class="divider"></li>
                          
                          {{-- Logout --}}

                          <li role="presentation">

                          <!-- <span style="float:left;" class="glyphicon glyphicon-off"></span> 
 -->
                          <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"> <i class="glyphicon glyphicon-off"></i> Logout</a>
                         <form id="logout-form" 
                                action="{{ url('/logout') }}" 
                            method="POST" 
                            style="display: none;">
                                        {{-- {{ csrf_field() }} --}}
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          </form>
                           </li>

                           {{-- Logout --}}

                        </ul>
                      </li>

            @else

             <li role="presentation" {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="{{ url('home')}}">Home</a></li>
               <li role="presentation" {{{ (Request::is('about') ? 'class=active' : '') }}}><a href="{{ url('about')}}">About</a></li>
           
 
                <!-- Login -->
                <!-- <li role="presentation" {{{ (Request::is('login') ? 'class=active' : '') }}}><a href="{{ url('login')}}">Login</a></li>
             -->
                <!-- Register -->
                <!-- <li role="presentation" {{{ (Request::is('register') ? 'class=active' : '') }}}><a href="{{ url('register')}}">Register</a></li> -->

            @endif

            {{-- END ONLY ACCESSIBLE BY LOGIN/REGISTERED USER --}}

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

@if(Sentinel::check())
<ol class="breadcrumb">
  <li><a href="{{ url('dashboard/') }}">Dashboard</a></li><li><a href="#">@yield('title')</a></li>
</ol>
@endif