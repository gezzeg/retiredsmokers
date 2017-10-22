@extends('layouts.master')

@section('title', 'Record')


@section('content')

<style type="text/css">
  
.test {
    font-family: Verdana,Arial,sans-serif;
    font-size: .8em;
}
  
</style>

<div class="row">


        @include('records.shared.side')
  
  <div class="col-md-9">
            <ul>
       <li>     Do you currently attempt to quit smoking?</li>
  <li>Did you ever try to quit?</li>
  <li>Have you quit?</li>
  Share with us!
  </ul>

    
    <div class="panel panel-default">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">All Record: </h3>
<button class="btn btn-success pull-right" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span> ADD
          </button>
      </div>
      <div class="panel-body">

          @if(session('error'))
          <div class="alert alert-danger">
            {{session('error')}}
          </div>
          @elseif(session('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
          @endif


       <table class="table" id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Status</th>
            <th>Date</th>
            <th>Note</th>
            <th>Actions</th>
          </tr>
         </thead>
         <tbody id="users-list" name="users-list">
           
          
          @if($records->count())

                @foreach ($records as $record)
               <!-- <tr id="user{{$record->id}}">
                <td>{{$record->id}}</td>
                 <td >{{$record->user_id}}</td>
                 <td><input type="text" name="smoking_statuses_id" class="form-control" placeholder="SmokingStatus" value="{{ $record->smoking_statuses_id}}"></td>   
                 <td><input type="date" name="date" class="form-control" placeholder="Date" value="{{ $record->date}}"></td>           
                  <td>
                  <button class="edit-modal btn btn-info" data-id="{{$record->id}}" data-user_id="{{$record->user_id}}" data-smoking_statuses_id="{{$record->smoking_statuses_id}}" data-date="{{$record->date}}" value="{{$record->id}}">Edit</button>
                  <button class="delete-modal btn btn-danger" data-id="{{$record->id}}" value="{{$record->id}}">Delete</button>
                  </td>
                </tr> -->
                <tr id="record{{$record->id}}" class="record{{$record->id}}">
                <td>{{$record->id}}</td>
                 <td >{{$record->user_id}}</td>
                 <td>{{ @$record->smokingStatus->name}}</td>   
                 <td>{{ $record->date}}</td>  
                 <td>{{ $record->note}}</td>         
                  <td>
                  <button class="edit-modal btn btn-info" data-id="{{$record->id}}" data-user_id="{{$record->user_id}}" data-smoking_statuses_id="{{$record->smoking_statuses_id}}" data-date="{{$record->date}}" data-note="{{$record->note}}" value="{{$record->id}}">Edit</button>

                  <button class="delete-modal btn btn-danger" data-id="{{$record->id}}" data-user_id="{{$record->user_id}}" data-smoking_statuses_id="{{$record->smoking_statuses_id}}" data-date="{{$record->date}}" data-note="{{$record->note}}" value="{{$record->id}}">Delete</button>
                  </td>
                </tr>
                @endforeach

           @else
              
              <tr class="no-record"><td colspan="6"> <center> No record available!</center> </td></tr>

           @endif

          
       
        </tbody>
        </table>

      </div>

    </div>


  </div>

</div>
 

<div id="recordModal" class="modal fade" role="dialog">
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


          <!--
            <div class="form-group">
              <label class="control-label col-sm-2" for="user_id">User ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="user_id" id="user_id">
              </div>
            </div>

            
            <div class="form-group">
             
              <label class="control-label col-sm-2" for="smoking_statuses_id">Smoking Status:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="smoking_statuses_id">
              </div>
              </div> -->


            <div class="form-group">
              <label class="control-label col-sm-2" for="smoking_statuses_id">Status:</label>
              <div class="col-sm-10">
              <select class="form-control" id="smoking_statuses_id">
              <option value="1" selected="">Attempt</option>
              <option value="2" selected="">Quit</option>
              <option value="3" selected="">Withdraw</option>
            </select>
            </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Date:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control required" id="date">
              </div>
              </div>
            
             <div class="form-group">
              <label class="control-label col-sm-2" for="note">Note:</label>
              <div class="col-sm-10">
                <input type="note" class="form-control" id="note">
              </div>
              </div>

          </form>

          <div class="deleteContent">
            Are you sure you want to delete record <span class="dname"></span> ? <span
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


    
<meta name="_token" content="{!! csrf_token() !!}" />
<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
-->
 

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

           var option=$(this).data('smoking_statuses_id');

           $('#smoking_statuses_id option[value=option]').prop('selected', true);
            $('#date').val($(this).data('date'));
            $('#note').val($(this).data('note'));

        $('#recordModal').modal('show');
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
        $('.dname').html($(this).data('date'));
        //$('.dname').val($(this).data('id'));

        $('#recordModal').modal('show');
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
        
        $('.form-horizontal').show();
         $('.deleteContent').hide();
    
         $('#recordModal').modal('show');

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
        url:'record',
        //data:$(this).serialize(),
         data: {
                //'_token': $('input[name=_token]').val(),
                'user_id': $("#user_id").val(),
                'smoking_statuses_id': $('#smoking_statuses_id').val(),
                'date':$('#date').val(),
                'note':$('#note').val(),
            },
        dataType: 'json',

        success: function(data){
            console.log(data);

        var smokeStatus;

        switch(data.smoking_statuses_id){
          case 1: smokeStatus="Attempt";
                  break;
          case 2: smokeStatus="Quit";
                  break;
          case 3: smokeStatus="Withdraw";
                  break;
          default: smokeStatus="None";
        }


          $('#table').append("<tr class='record"+data.id+"'><td>" + data.id + "</td><td>" + data.user_id + "</td><td>" + smokeStatus + "</td><td>" + data.date + "</td><td>" + data.note + "</td><td><button class='edit-modal btn btn-info' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-smoking_statuses_id='"+ data.smoking_statuses_id+ "' data-date='"+data.date+"' data-note='"+data.note+"' value='"+ data.id + "'>Edit</button>        <button class='delete-modal btn btn-danger' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-smoking_statuses_id='"+ data.smoking_statuses_id+ "' data-date='"+data.date+"' value='"+ data.id + "'>Delete</button></td></tr>");
          $(".no-record").remove();

         

        },
        error: function(data){



        }
    })
    });


 //EDIT/////////////////////////////////
 $('.modal-footer').on('click', '.edit', function(e) {
 
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
        url:'record/update/'+$("#id").val(),
        //data:$(this).serialize(),
         data: {
                //'_token': $('input[name=_token]').val(),
                'user_id': $("#user_id").val(),
                'smoking_statuses_id': $('#smoking_statuses_id').val(),
                'date':$('#date').val(),
                'note':$('#note').val(),

            },
        dataType: 'json',

        success: function(data){
            console.log(data);

             $(".record"+data.id).replaceWith("<tr class='record"+data.id+"'><td>" + data.id + "</td><td>" + data.user_id + "</td><td>" + data.smoking_statuses_id + "</td><td>" + data.date + "</td><td>" + data.note + "</td><td><button class='edit-modal btn btn-info' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-smoking_statuses_id='"+ data.smoking_statuses_id+ "' data-date='"+data.date+"' data-note='"+data.note+"' value='"+ data.id + "'>Edit</button>        <button class='delete-modal btn btn-danger' data-id='"+ data.id + "' data-user_id='"+ data.user_id+"' data-smoking_statuses_id='"+ data.smoking_statuses_id+ "' data-date='"+data.date+"' value='"+ data.id + "'>Delete</button></td></tr>");

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
            url: 'record/delete/'+$('.did').text(),
            data: {
                'id': $('.did').text(),
            },
            success: function(data) {
              console.log(data);
              $(".record"+$('.did').text()).remove();
              //$('.item' + $('.did').text()).remove();
            }
        });
    });



    </script>
@if($records->count())
 
@endif
      @endsection