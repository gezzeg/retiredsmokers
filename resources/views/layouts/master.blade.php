
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    {{-- <script src="{!! asset('js/jquery/jquery-3.1.1.min.js') !!}"></script> --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('bootstrap-3.3.7/css/bootstrap.min.css') !!}">

    <!-- RetiredSmokers CSS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/retiredsmokers.css') !!}">

    <script src="{!! asset('js/retiredsmokers.js') !!}"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="{!! asset('bootstrap-3.3.7/css/bootstrap-theme.min.css') !!}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{!! asset('bootstrap-3.3.7/js/bootstrap.min.js') !!}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


@if(Route::is('members.index'))
    <link href="{{ asset('css/clusterstyle.css') }}" media="all" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="{!! asset('js/googlemap/cluster/src/markerclusterer.js') !!}"></script>
@endif     


@if(Route::is('locationCluster'))
    <link href="{{ asset('css/clusterstyle.css') }}" media="all" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="{!! asset('js/googlemap/cluster/src/markerclusterer.js') !!}"></script>
@endif     
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link href="{!! asset('bootstrap-3.3.7/css/navbar.css') !!}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    {{-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> --}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @if(Route::is('locationCluster'))

      <link href="{{ asset('css/clusterstyle.css') }}" media="all" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="{!! asset('js/googlemap/cluster/src/markerclusterer.js') !!}"></script>

    @endif

  </head>

  <body>


    <div class="container">

    @include('layouts.menu')  


  

@yield('content')


      
      @include('layouts.footer')


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    {{-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> --}}

    {{-- <script src="{!! asset('bootstrap-3.3.7/js/bootstrap.min.js') !!}"></script> --}}
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> --}}
  </body>
</html>
