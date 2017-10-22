@extends('layouts.master')

@section('title', 'Edit Story')


@section('content')



 <div class="row">
<form method="POST">
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        @include('post.shared.side')  
     

    <div class="col-md-6">
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">
              Submit My Story
            </div>
          </div>
          <div class="panel-body">

          @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
          @endforeach

          @if(session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
           
           
            
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $post->title }}" required>
              </div>

            <textarea name="content" class="form-control" name="content" id="editor1" rows="10" cols="80">
               {{ $post->content }}
            </textarea>

           <div class="form-group">

               {{--  <input type="submit" name="submit" value="Save" class="btn btn-default" style="padding:10px;margin:5px;">

                 <a href="{{ route('post.index') }}" title="" class="btn btn-default" style="padding:10px;margin:5px;">Cancel</a> --}}

           </div>
            


            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
       

          </div>
        </div>
      </div>

      

            <div class="col-md-3">
     <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Settings
        </div>
      </div>
      <div class="panel-body">


        <div class="form-group">
            
            <label for="status">Status</label>   
          

           {{ $post->status }}


            <select class="form-control" name="status"> 
            
              <option {{ $post->status =="Draft"? 'selected="selected"':'' }}>Draft</option>
              <option {{ $post->status =="Publish"? 'selected="selected"':'' }}>Publish</option>
           
            </select> 



        </div>
        <div class="form-group">
            
            <label for="status">Privacy</label>   

            {{ $post->privacy }}
          
            <select class="form-control" name="privacy"> 
            
              <option {{ $post->privacy =="Public"? 'selected="selected"':'' }}>Public</option>
              <option {{ $post->privacy =="Private"? 'selected="selected"':'' }}>Private</option>
           
            </select> 



        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-default" style="padding:5px;margin:0px;">

               <a href="{{ route('post.index') }}" title="" class="btn btn-default" style="padding:5px;margin:0px;">Cancel</a>


              
 </form>

  <button class="btn btn-danger" onclick="event.preventDefault();
                   document.getElementById('delete-post-form').submit();"><span class="glyphicon glyphicon-trash"></span></button>

{{-- <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="form-group">
        <button type="submit" class="btn btn-danger">DELETE</button>
    </div>
</form>

 --}}

{{-- <button class="btn btn-danger" type="submit" name="delete" value="delete">Delete</button> --}}

               
                

               

               {{--   <a href="{{ route('post.delete', $post->id) }}" title="" class="btn btn-default" style="padding:5px;margin:0px;">Delete</a> --}}

                {{-- <a href="{!! route('organisations.index', ['menu' => 'p11-c3']) !!}"> --}}

               {{--  {{ URL::to('location/'. $userProfile->user_id.'/edit') }} --}}
        </div>


      </div>
    </div>
  </div>
            



</div>



                         <form id="delete-post-form" 
                                action="{{ url('/story', $post->id ) }}"
                             method="post"
                            style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                          </form>

      @endsection