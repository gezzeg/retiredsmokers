
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>@yield('title')</title>

     <script src="{!! asset('js/jquery/jquery-3.1.1.min.js') !!}"></script>

    <!-- Bootstrap core CSS 
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   -->
    
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap/bootstrap.min.css') !!}">

    <!-- Custom styles for this template 
    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    -->

     <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap/jumbotron-narrow.css') !!}">

    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

    <script src="{!! asset('js/bootstrap/bootstrap.min.js') !!}"></script>


    @if(Route::is('locationCluster'))

      <link href="{{ asset('css/clusterstyle.css') }}" media="all" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="{!! asset('js/googlemap/cluster/src/markerclusterer.js') !!}"></script>

    @endif



  </head>

  <body>

    <div class="container">
     


      <div class="header clearfix">
        
       @include('layouts.menu')
       

      </div>

      
      <!--
      <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="{{route('home')}}">Home</a>
        <i class="fa fa-angle-right"></i>
      </li>
      @for($i = 0; $i <= count(Request::segments()); $i++)
      <li>
        <a href="">{{Request::segment($i)}}</a>
        @if($i < count(Request::segments()) & $i > 0)
          {!!'<i class="fa fa-angle-right"></i>'!!}
        @endif
      </li>
      @endfor
      </ul>
     
      -->

      @yield('content')


      
      @include('layouts.footer')

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
