@extends('layouts.master')

@section('title', 'Symptoms')

@section('content')

 @include('symptoms.shared.side') 


  <div class="col-md-9">
    

   

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
        <button class="btn btn-success pull-right" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span> ADD
          </button>
      </div>
      <div class="panel-body">


    <p>Some of us may or may not facing withdrawal symptoms. Lets share our symptoms and from your feedback we can generate some statistics upon it.</p>
  

        <hr>

        <table class="table" id="table">

          <thead>
            <tr><th> <input type="checkbox" name="symptoms" id="symptoms"> </th><th>Symptoms Name</th><th>Notes</th><th>Action</th></tr>
          </thead>
          <tbody>

          @if($userSymptoms->count())  

          @foreach ($userSymptoms as $symptom)

            <tr id="symptom{{$symptom->id}}" class="symptom{{$symptom->id}}">
              <td class="col-md-1">{{-- {{ $loop->iteration }} --}}<input type="checkbox" class="checkBoxClass" name="symptoms[]" value="{{ $symptom->id }}"></td>
              <td class="col-md-4" >{{ $symptom->symptom->name }}</td>
              <td class="col-md-4"> {{ $symptom->note }} </td>
              <td class="col-md-3">
                
                <button class="edit-modal btn btn-info" data-id="{{$symptom->id}}" data-user_id="{{$symptom->user_id}}" data-symptom_records_id="{{$symptom->symptom->id}}" data-note="{{$symptom->note}}" value="{{$symptom->id}}">Edit</button>

                  <button class="delete-modal btn btn-danger" data-id="{{$symptom->id}}" data-user_id="{{$symptom->user_id}}" data-symptom_records_id="{{$symptom->symptom->name}}" data-note="{{$symptom->note}}" value="{{$symptom->id}}">Delete</button>
                  </td>

              </td>
            </tr>

          @endforeach

         <tr class="no-record"><td colspan="4" class=""> 
{{-- 
          <a href="" class="btn btn-default" title="">Delete checked symptoms.</a>
           --}}
              </td></tr>

          @else
              
              <tr class="no-record"><td colspan="4" class="text-center"> No record available! 
              </td></tr>

           @endif


          </tbody>
        </table>

      </div>
    </div>  



  </div>
</div>

<div id="symptomModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        
        <div class="modal-body">
          
          <form class="form-horizontal" role="form">
           

           <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id" disabled>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="symptom_records_id">Symptom:</label>
              <div class="col-sm-10"> 

              <select class="form-control" id="symptom_records_id">
              
                @foreach ($symptoms as $symptom)
                  <option value="{{$symptom->id}}"}}>{{$symptom->name}}</option>

                @endforeach             
              

            </select>
            </div>
            </div>

          
            
             <div class="form-group">
              <label class="control-label col-sm-2" for="note">Note:</label>
              <div class="col-sm-10">
                <textarea id="note" name="note" class="form-control" placeholder="Anything about your symptom here."></textarea>
              </div>
              </div>

          </form>

          <div class="deleteContent">
            Confirm to delete symtom <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal" id="actionBtn" value="">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <!--
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button> -->
          </div>

        </div>

      </div>
    </div>
</div>

{{-- <div id="symptomModalUpdate" class="modal fade" role="dialog">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        
        <div class="modal-body">
          
          <form class="form-horizontal" role="form">
           

           <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id" disabled>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="symptom_records_id">Symptom:</label>
              <div class="col-sm-10"> 

              <select class="form-control" id="symptom_records_id">
              
                @foreach ($registeredSymptoms as $symptom)
                  <option value="{{$symptom->id}}"}}>{{$symptom->name}}</option>

                @endforeach             
              

            </select>
            </div>
            </div>

          
            
             <div class="form-group">
              <label class="control-label col-sm-2" for="note">Note:</label>
              <div class="col-sm-10">
                <textarea id="note" name="note" class="form-control" placeholder="Anything about your symptom here."></textarea>
              </div>
              </div>

          </form>

          <div class="deleteContent">
            Confirm to delete symtom <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal" id="actionBtn" value="">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <!--
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button> -->
          </div>

        </div>

      </div>
    </div>
</div> --}}

<meta name="_token" content="{!! csrf_token() !!}" />


    <script type="text/javascript">
 

        $(document).on('click', '.edit-modal', function() {
        
            $('.modal-title').text('Edit');
            $('.actionBtn').text("Update"); 
           // $('#actionBtn').value("update"); 
            
            $('.actionBtn').addClass('btn-success'); 
            $('.actionBtn').addClass('edit');

            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').removeClass('delete');
     
            $('.deleteContent').hide();

            $('#footer_action_button').text(" Update");
            $('#footer_action_button').addClass('glyphicon-check');

            $('.form-horizontal').show();

            $('#id').val($(this).data('id'));


            $('#user_id').val($(this).data('user_id'));
          // $('#smoking_statuses_id').val($(this).data('smoking_statuses_id'));

          // var option=$(this).data('smoking_statuses_id');
          var option;
          
        

         // $("#symptom_records_id").prop("disabled", true);

           //$('#smoking_statuses_id option[value=option]').prop('selected', true);
            $('#symptom_records_id').val($(this).data('symptom_records_id'));
             $("#symptom_records_id").prop("disabled", true);
            //$('#date').val($(this).data('date'));
            $('#note').val($(this).data('note'));

        $('#symptomModal').modal('show');
    });


$(document).on('click', '.delete-modal', function(e) {
        
        $('.modal-title').text('Delete');
        $('.actionBtn').text("Delete"); 
       // $('#actionBtn').value("delete");

        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');

        
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').removeClass('add');
        $('.actionBtn').addClass('delete');


        $('#footer_action_button').text("Delete");
        $('#footer_action_button').addClass('glyphicon-trash');
        
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('symptom_records_id'));
        //$('.dname').val($(this).data('id'));

        $('#symptomModal').modal('show');
    }); 

   $("#add").click(function(){
        $('.actionBtn').text("Add"); 
        $('.modal-title').text('Add');
       // $('#actionBtn').value("add");

        $('#footer_action_button').text("Save");


        $('.form-horizontal').trigger("reset");
        //$('#form-horizontal').reset();
        $('#footer_action_button').addClass('glyphicon-check');
        //$('#footer_action_button').removeClass('glyphicon-trash');
        //$('#footer_action_button').css({"font-family":"Helvetica Neue,Helvetica,Arial,sans-serif"});
       // $('#footer_action_button').css({"color":"white"});
      //  $('#footer_action_button').css({"font-weight":"bold"});
        
        //close delete section
        $('.actionBtn').addClass('btn-success');
        

         $('.actionBtn').addClass('add');

        $('.actionBtn').removeClass('edit');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').removeClass('btn-danger');
        $('.deleteContent').hide();

         $("#symptom_records_id").prop("disabled", false);
        
         $('.form-horizontal').show();
         $('.deleteContent').hide();
         $('#symptomModal').modal('show');

    });

//ADD/////////////////////////////////
 $('.modal-footer').on('click', '.add', function(e) {
 
    /*$.ajaxSetup({
        headers:$('meta[name="_token"]').attr('content')
    })*/
    

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })


    e.preventDefault(e);

        $.ajax({

        type:"POST",
        url:'symptoms',
        //data:$(this).serialize(),
         data: {
                //'_token': $('input[name=_token]').val(),
                //'user_id': $("#user_id").val(),
                'symptom_records_id': $('#symptom_records_id').val(),
                'note':$('#note').val(),
            },
        dataType: 'json',

        success: function(data){
            console.log(data);
            location.reload(true);

        //var smokeStatus="";
        var rows_number;

        if($('tr.no-record').length){
          rows_number = 1;
        }else
          rows_number=rows_number;


        // switch(data.smoking_statuses_id){
        //   case 1: smokeStatus="Attempt";
        //           break;
        //   case 2: smokeStatus="Quit";
        //           break;
        //   case 3: smokeStatus="Withdraw";
        //           break;
        //   default: smokeStatus="None";
        // }


          $('#table').append("<tr class='symptom"+data.id+"'><td class=\"col-md-1\"><input type=\"checkbox\" /></td><td class=\"col-md-4\">" + data.symptom_records_id + "</td><td class=\"col-md-4\">" + data.note + "</td><td class=\"col-md-3\"><button class='delete-modal btn btn-danger' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' value='"+ data.id + "'>Delete</button></td></tr>");
           // $('#table').append("<tr class='symptom"+data.id+"'><td><input type=\"checkbox\" /></td><td>" + data.symptom_records_id + "</td><td>" + data.note + "</td><td><button class='edit-modal btn btn-info' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' data-note='"+data.note+"' value='"+ data.id + "'>Edit</button>        <button class='delete-modal btn btn-danger' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' value='"+ data.id + "'>Delete</button></td></tr>");

          $(".no-record").remove();

         

        },
        error: function(data){



        }
    })
    });


//EDIT/////////////////////////////////
 $('.modal-footer').on('click', '.edit', function(e) {
 

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })


    e.preventDefault(e);

        $.ajax({

        type:"POST",
        url:'symptoms/update/'+$("#id").val(),
        //data:$(this).serialize(),
         data: {
                //'_token': $('input[name=_token]').val(),
                //'user_id': $("#user_id").val(),
                'id': $('#id').val(),
                'symptom_records_id': $('#symptom_records_id').val(),
                'note':$('#note').val(),
            },
        dataType: 'json',

        success: function(data){
            console.log(data);
            

        //var smokeStatus="";
        var rows_number;

        if($('tr.no-record').length){
          rows_number = 1;
        }else
          rows_number=rows_number;


        // switch(data.smoking_statuses_id){
        //   case 1: smokeStatus="Attempt";
        //           break;
        //   case 2: smokeStatus="Quit";
        //           break;
        //   case 3: smokeStatus="Withdraw";
        //           break;
        //   default: smokeStatus="None";
        // }


          $(".symptom"+data.id).replaceWith("<tr class='symptom"+data.id+"'><td class=\"col-md-1\"><input type=\"checkbox\" /></td><td class=\"col-md-4\">" + data.symptom_records_id + "</td><td class=\"col-md-4\">" + data.note + "</td><td class=\"col-md-3\"><button class='edit-modal btn btn-info' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' data-note='"+data.note+"' value='"+ data.id + "'>Edit</button> <button class='delete-modal btn btn-danger' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' value='"+ data.id + "'>Delete</button></td></tr>");
           // $('#table').append("<tr class='symptom"+data.id+"'><td><input type=\"checkbox\" /></td><td>" + data.symptom_records_id + "</td><td>" + data.note + "</td><td><button class='edit-modal btn btn-info' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' data-note='"+data.note+"' value='"+ data.id + "'>Edit</button>        <button class='delete-modal btn btn-danger' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-symptom_records_id='"+ data.symptom_records_id+ "' value='"+ data.id + "'>Delete</button></td></tr>");

          //$(".no-record").remove();
         // location.reload(true);


         

        },
        error: function(data){



        }
    })
    });

    //DELETE////////////////////////////
    $('.modal-footer').on('click', '.delete', function(e) {

       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

       e.preventDefault(e);


            $.ajax({
                type: 'post',
                url: 'symptoms/delete/'+$('.did').text(),
                data: {
                    'id': $('.did').text(),
                },
                success: function(data) {

                  console.log(data);
                  //alert('Success');
                  $(".symptom"+$('.did').text()).remove();


                  location.reload(true);

                  //$('.item' + $('.did').text()).remove();
                },

                error: function (result, status, err) {
                  alert(result.responseText);
                  alert(status.responseText);
                  alert(err.Message);
                }




            });
        });


    </script>

@endsection