@extends('layouts.master')



@section('title', 'Show Profile')


@section('content')
  
    



<div class="row">
  
  <div class="col-md-12">
    
    <div class="panel panel-primary">
      
      <div class="panel-heading">
        
        <h3 class="panel-title">Laravel CRUD Application using Ajax without Reloading Page </h3>
<!--<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New user</button>-->


      </div>
      <div class="panel-body">

	<div class="form-group row add">

 <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	    <div class="col-md-8">
	       <!--
	        <input type="text" class="form-control" id="name" name="name"
	            placeholder="Enter some name" required>

	            -->
	        <input type="text" class="form-control" id="user_id" name="user_id"
	            placeholder="" required>
	        <input type="text" class="form-control" id="smoking_statuses_id" name="smoking_statuses_id"
	            placeholder="Status" required>
	        <input type="text" class="form-control" id="date" name="date"
	            placeholder="Date" required>


	        <p class="error text-center alert alert-danger hidden"></p>
	    </div>
	    <div class="col-md-4">
	        <button class="btn btn-primary" type="submit" id="add">
	            <span class="glyphicon glyphicon-plus"></span> ADD
	        </button>
	    </div>
	</div>


	 <table class="table">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Smoking Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
         </thead>
         <tbody id="users-list" name="users-list">
           
           @foreach ($records as $record)
            <tr id="user{{$record->id}}">
             <td>{{$record->user->first_name}} ( User Id: {{$record->user_id}} )</td>
             <td>{{$record->smoking_statuses_id}}</td>
             <td>{{$record->date}}</td>             
              <td>
              <button class="edit-modal btn btn-info" data-id="{{$record->id}}" value="{{$record->id}}">Edit</button>
              <button class="delete-modal btn btn-danger" data-id="{{$record->id}}" value="{{$record->id}}">Delete</button>
              </td>
            </tr>
            @endforeach
       
        </tbody>
        </table>

</div>

    </div>


    <div id="myModal" class="modal fade" role="dialog">
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
							<label class="control-label col-sm-2" for="name">User ID:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="user_id" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Smoking Status:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="smoking_statuses_id" value="">
							</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Date:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="date" value="">
							</div>

						</div>	
						</div>						
					</form>

					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
							class="hidden did"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
		
		<script>

//EDIT START///////////////////////////////////////////////////////		
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.actionBtn').removeClass('delete');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        //$('#fid').val($(this).data('id'));
        //$('#n').val($(this).data('name'));

        	$('#id').val($(this).data('id'));
			$('#user_id').val($(this).data('user_id'));
			$('#smoking_statuses_id').val($(this).data('smoking_statuses_id'));
			$('#date').val($(this).data('date'));

           /* $('#product_id').val(data.id);
            $('#name').val(data.name);
            $('#details').val(data.details);
            $('#btn-save').val("update");*/

        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.actionBtn').removeClass('edit');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));

        $('#myModal').modal('show');
    });



    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: 'store',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
//EDIT END///////////////////////////////////////////////////////

//ADD START///////////////////////////////////////////////////////
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '{{ url('record')}}',
            data: {
                '_token': $('input[name=_token]').val(),
                'user_id': $('input[name=user_id]').val(),
                'smoking_statuses_id': $('input[name=smoking_statuses_id]').val(),
                'date': $('input[name=date]').val()
            },
            success: function(data) {
                if ((data.errors)){
                	$('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                    console.log("asd");
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.user_id + "</td><td>" + data.smoking_statuses_id + "</td><td>" + data.date + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
    });
    //ADD END///////////////////////////////////////////////////////

    //DELETE START///////////////////////////////////////////////////////
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: 'deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
    //DELETE END///////////////////////////////////////////////////////
</script>

        </div>

</div>

  
   


      @endsection