@extends('layouts.master')

@section('title', 'Symptoms')

@section('content')

 @include('symptoms.shared.side') 


  <div class="col-md-9">
    

    <form method="POST">

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

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          My Withdrawal Symptoms 

        </div>
      </div>
      <div class="panel-body">


    <p>Some of us may or may not facing withdrawal symptoms. Lets share our symptoms and from your feedback we can generate some statistics upon it.</p>
  

        <hr>

        <table class="table  table-striped">

          <thead>
            <tr><th> # </th><th>Symptoms Name</th><th>Notes</th><th>Status</th></tr>
          </thead>
          <tbody>

          @if($userSymptoms->count())  

          @foreach ($symptoms as $symptom)

            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $symptom->name }}</td>
              <td> {{ $symptom->note }} </td>
              <td>  

               @foreach ($userSymptoms as $userSymptom)
                  @if ($userSymptoms[$loop->index]->symptom_records_id == $symptom->id)
                    Yes
                  @endif
                @endforeach

              </td>
            </tr>

          @endforeach

            <tr><td colspan="4">
            
            <hr> 
              <ul class="symptom-settings">
                <li><input type="checkbox" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="I allow to share my simptoms to public"> I allow to share my simptoms to public</li>
            </ul>
            <hr>

            <a  class="btn btn-primary btn-block" role="button" href="{{ URL::to('symptoms/edit') }}">Edit</a></td></tr>

          @else
              
              <tr class="no-record"><td colspan="6"> <center> No record available! <br><br>

 <a  class="btn btn-primary" role="button" href="{{ URL::to('symptoms/edit') }}">Update</a> <br>

              </center></td></tr>

           @endif


          </tbody>
        </table>

      </div>
    </div>  

  </form>

  </div>
</div>


@endsection