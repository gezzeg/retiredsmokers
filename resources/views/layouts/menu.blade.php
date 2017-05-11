 <nav>
       

           <ul class="nav nav-pills pull-right">


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
                 
                 <!-- Profile -->
                
              {{--  <li role="presentation" {{{ (Request::is('profile') ? 'class=active' : '') }}}><a href="{{url('profile/'.Sentinel::getUser()->getUserId()) }}">Profile</a></li>  
                 
--}}<li role="presentation" {{{ (Request::is('profile') ? 'class=active' : '') }}}><a href="{{url('profile') }}">Profile</a></li> 


                 <!-- Profile -->

                           <!-- Record -->
                          <li role="presentation" {{{ (Request::is('record') ? 'class=active' : '') }}}><a href="{{ url('record')}}">Smoking History</a></li>    
                          <!-- Record -->

                          <li class="divider"></li>
                          <li><a href="#">Configuration</a></li>
                          <li class="divider"></li>
                          
                           <!-- Logout -->
                          <li role="presentation">

                           <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Logout</a>
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

          
</nav>

 <!-- 
 <form action="logout" method="POST" id="logout-form">  
 
              {{ csrf_field() }}


                </form> 
                -->

 <h3 class="text-muted">

          @if(Sentinel::check())

           <img src="{{ url('/')}}/images/logo-retiredsmokers-badge.png" style="width: 100px; height:100px;">Retired Smokers

           <!-- Hello, {{ Sentinel::getUser()->first_name }} ! -->

          @else

            <img src="{{ url('/')}}/images/logo-retiredsmokers-badge.png" style="width: 100px; height:100px;">Retired Smokers

          @endif

        </h3>