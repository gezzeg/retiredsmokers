@extends('layouts.master')

@section('title', 'Create Story')


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
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
              </div>

            <textarea name="content" class="form-control" name="content" id="editor1" rows="10" cols="80">
                Tell us you story and inspire others!
            </textarea>

           
            


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
            <select class="form-control" name="status"> 

             
               <option>Draft</option>
          
              <option>Publish</option>
             

            </select> 
            </div>

             <div class="form-group">
            
            <label for="status" >Privacy</label>   
          
            <select class="form-control" name="privacy"> 
            
              <option>Private</option>
              <option>Public</option>
              
           
            </select> 



        </div>

        <div class="form-group">

               
               {{--  <a href="" title="" class="btn btn-success" style="padding:10px;margin:5px;">Save</a>  --}}

                <input type="submit" name="submit" value="Save" class="btn btn-default" >

                
              {{--  <button class="btn btn-default">Send</button>
               <button class="btn btn-default">Cancel</button> --}}

            <a href="{{ route('post.index') }}" title="" class="btn btn-default">Cancel</a>

           </div>


      </div>
    </div>
  </div>
            

 </form>

</div>


      @endsection