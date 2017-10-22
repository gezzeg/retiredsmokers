@extends('layouts.master')

@section('title', 'Members Story')


@section('content')



 <div class="row">


        @include('post.shared.side')  
     
   

    <div class="col-md-6">
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">
              
              Members Story  
            
            </div>
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

           @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
          @endforeach

          @if(session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif             
           
{{--           @foreach ($posts as $post)
            {{ $post['id'] }} <br>
          @endforeach
 --}}
          {{-- Check if post null --}}

            @if (count($posts)==0)


            <p class="text-center">No story available.</p>

          
                      
          @else
            
           
                  
                      
           {{--  <div class="panel panel-default">
              <div class="panel-body"> --}}
                <table class="table">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Title</td>
                     <td>Date</td>
                    <td>Author</td>
                  </tr>
                </thead></tr>
                <tbody>
                 
                  @foreach($posts as $post)

                  <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>

{{--                       <a href="" id="view" data-toggle="modal" data-target="#myModal" data-id="{{ $post->id }}">{{ $post->title }}</a>  --}}


                    <a href="{{ url('story/others/'.$post->id)}}" title=""> {{ $post->title }}</a>

                    </td>
                    <td> {{ $post->created_at }} </td>

                    <td> {{ $post->user->first_name }} </td>
                  </tr>
               
                  @endforeach

                </tbody>
                </table>

                {{ $posts->links() }}

             {{--  </div>
              </div> --}}
                     
            
                      

          @endif
          

          </div>
        </div>
      </div>

      

            <div class="col-md-3">
     <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Info
        </div>
      </div>
      <div class="panel-body">

              @if (count($posts)==0)
              @else

       {{--  <div class="form-group">
          <span class="glyphicon glyphicon-thumbs-up"></span> 200 like your story.
        </div>  

        <div class="form-group">
          <span class="glyphicon glyphicon-star"></span> 20 people rate 3 star your story.
        </div>  

        <div class="form-group">
        <span class="glyphicon glyphicon-eye-open"></span> 100 have read your story.
                   
        </div>
 
        <div class="form-group">
            
            
                <a href="{{ url('story/edit') }}" class="btn btn-default" title="">Update</a> --}}
               
                
    
         </div>

         @endif  

      </div>
    </div>
  </div>
            



</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="modal-body">
      
        <div class="panel panel-default">
          <div class="panel-body otherpost">
            asdasdasd
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  //$(document).on('click', '.edit-modal', function() {
//   $('#myModal').on('shown.bs.modal', function () {
//   $('#myInput').focus();
//  $('.manager').text($(e.currentTarget).data('text'));
  
// });

   $(document).on('click','#view', function(e) {
    

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })


    e.preventDefault(e);

        $.ajax({

        type:"GET",
        url:'/retiredsmokers/public/story/others/'+$(this).data('id'),
      
        dataType: 'json',

        success: function(data){
            console.log(data);
           
          
          $('#myModalLabel').replaceWith(data.title);
          $('.otherpost').replaceWith(data.content);
          
        $("#myModal .modal-body").load(target, function() { 
         $("#myModal").modal("show"); 
        });

         

        },
        error: function(data){



        }
    })












   });



</script>

      @endsection