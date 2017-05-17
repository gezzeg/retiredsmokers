@extends('layouts.master')

@section('title', 'About')


@section('content')


<div class="row">
  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">About</h3>

      </div>
      <div class="panel-body">

        <p><a href="https://test.httpapi.com/api/domains/available.json?auth-userid=182065&api-key=UYnvRZLQ69TGWHajdpUttl0Qj7nfQJsA&domain-name=ghazalitajuddin&tlds=com&tlds=net">Test</a></p>

      </div>

      <script type="text/javascript"
  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  var domain  = "whoapi.com"; // domain name you want to check
  var r     = "taken";  // check availability
  var apikey  = "demokey";  // your API key

  // API call
  $.getJSON('https://test.httpapi.com/api/domains/available.json?auth-userid=182065&api-key=UYnvRZLQ69TGWHajdpUttl0Qj7nfQJsA&domain-name=ghazalitajuddin&tlds=com&tlds=net',
  function(dataObj){
    if(dataObj.status == 0){
      // show the result
      $('#result').html(dataObj.data);
      }else{
      // show error
      $('#result').html(dataObj.status_desc);
    }
  });
</script>
<div id="result">[please wait]</div>


{{  $obj["ghazalitajuddin.net"]["status"] }}


    </div>

  </div>

</div>



  

 



      @endsection