@extends('layouts.master')

@section('title', 'Show Profile')


@section('content')


<div class="row">
  
  <div class="col-md-12">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Laravel CRUD Application using Ajax without Reloading Page </h3>
<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New user</button>
      </div>
      <div class="panel-body">


      

       <table class="table">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Smoking Status</th>
            <th>Date</th>
            <th>date</th>
            <th>Actions</th>
          </tr>
         </thead>
         <tbody id="users-list" name="users-list">
           
           @foreach ($records as $record)
            <tr id="user{{$record->id}}">
             <td>{{$record->user->first_name}} ( User Id: {{$record->user_id}} )</td>
             <td>{{$record->smoking_statuses_id}}</td>
             <td>{{$record->date}}</td>             
             <td>{{$record->date}}</td>
              <td>
              <button class="btn btn-warning btn-detail open_modal" value="{{$record->id}}">Edit</button>
              <button class="btn btn-danger btn-delete delete-user" value="{{$record->id}}">Delete</button>
              </td>
            </tr>
            @endforeach
       
        </tbody>
        </table>
       



    

    @foreach($users as $user)

    {{ $user->first_name }}

    @endforeach

      </div>

    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">user</h4>
            </div>
            <div class="modal-body">
            <form id="frmusers" name="frmusers" class="form-horizontal" novalidate="">
                <div class="form-group error">
                 <label for="inputUserId" class="col-sm-3 control-label">User Id</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="smoking_statuses_id" name="user_id" placeholder="User Id" value="">
                   </div>
                   </div>                <div class="form-group error">
                 <label for="inputSmokingStatus" class="col-sm-3 control-label">Smoking Status</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="smoking_statuses_id" name="smoking_statuses_id" placeholder="Smoking Status" value="">
                   </div>
                   </div>
                 <div class="form-group">
                 <label for="inputDate" class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
            <input type="hidden" id="user_id" name="user_id" value="0">
            </div>
        </div>
      </div>
  </div>

   
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script type="text/javascript">
  
var url = "http://localhost:8888/retiredsmokers/public/record";
    //display modal form for user editing
    $(document).on('click','.open_modal',function(){
        var user_id = $(this).val();
       
        $.get(url + '/' + user_id, function (data) {
            //success data
            console.log(data);
            $('#user_id').val(data.id);
            $('#smoking_statuses_id').val(data.smoking_statuses_id);
            $('#date').val(data.date);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
    //display modal form for creating new user
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmusers').trigger("reset");
        $('#myModal').modal('show');
    });
    //delete user and remove it from list
    $(document).on('click','.delete-user',function(){
        var user_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + user_id,
            success: function (data) {
                console.log(data);
                $("#user" + user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    //create new user / update existing user
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var formData = {
            smoking_statuses_id: $('#smoking_statuses_id').val(),
            date: $('#date').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var user_id = $('#user_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + user_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var user = '<tr id="user' + data.id + '"><td>' + data.id + '</td><td>' + data.smoking_statuses_id + '</td><td>' + data.date + '</td>';

                user += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';

                user += ' <button class="btn btn-danger btn-delete delete-user" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#users-list').append(user);
                }else{ //if user updated an existing record
                    $("#user" + user_id).replaceWith( user );
                }
                $('#frmusers').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

</script>


  </div>

</div>



      @endsection