@extends('layouts.master')

@section('title', 'Edit Symptoms')


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
  
        <p>
         {{--  <ul class="symptom-settings">
                <li><input type="checkbox" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="I allow to share my simptoms to public"> 
                  I have experienced withdrawal symptoms during quit smoking.

                </li>
            </ul> --}}
          
          <ul class="symptom-settings">Have you have been admitted?
            <li><input type="radio" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="100% Recover"> Yes</li>
            <li><input type="radio" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="50%"> No</li>
          </ul>

          <ul class="symptom-settings">How you rate you withdrawal symptom now?
            <li><input type="radio" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="100% Recover"> 100% Recover</li>
            <li><input type="radio" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="50%"> 50%.</li>
            <li><input type="radio" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="No Change"> No Change</li>
            <li><input type="radio" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="Worsen"> Worsen</li>
          </ul>
          
        </p> 

        <hr>

        <table class="table  table-striped">

          <thead>
            <tr><th> <input type="checkbox" id="symptoms"> </th><th>Name</th><th>Notes</th></tr>
          </thead>
          <tbody>

          @foreach ($symptoms as $symptom)

            <tr>
              <td> <input type="checkbox" class="checkBoxClass" name="symptoms[]" value="{{ $symptom->id }}" 


                {{-- $userSymptoms['0']->symptom_records_id --}}
                
                {{-- Check if user simptomm exists--}}
                @foreach ($userSymptoms as $userSymptom)
                  @if ($userSymptoms[$loop->index]->symptom_records_id == $symptom->id)
                    checked
                  @endif
                @endforeach


                ></td>  
              <td>{{ $symptom->name }}</td>
             
              <td>

                <div class="form-group">

                  <textarea class="form-control"  rows="2" cols="25" style="max-width: 100%;" name="symptom-notes"></textarea>
                </div>
              </td>
            </tr>

          @endforeach

            <tr><td colspan="4">
            
            <hr> 
              <ul class="symptom-settings">
                <li><input type="checkbox" name="private-symptoms" data-toggle="tooltip" data-placement="left" title="I allow to share my simptoms to public"> I allow to share my simptoms to public</li>
            </ul>
            <hr>

            <button class="btn btn-primary btn-block">Submit</button></td></tr>
          </tbody>
        </table>

      </div>
    </div>  

  </form>

  </div>
</div>


@endsection