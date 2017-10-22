@extends('layouts.master')

@section('title', 'Story')


@section('content')



 <div class="row">


        @include('story.shared.side')  
     

    <div class="col-md-6">
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">
              My Story
            </div>
          </div>
          <div class="panel-body">
           
           <form method="POST">
            
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" required>
              </div>

            <textarea class="form-control" name="content" id="editor1" rows="10" cols="80">
                Tell us you story and inspire others!
            </textarea>

           <div class="form-group">
               
                <a href="" title="" class="btn btn-success" style="padding:10px;margin:5px;">Save</a> 

            <a href="" title="" class="btn btn-default" style="padding:10px;margin:5px;">Cancel</a>

           </div>
            


            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>

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
            <select class="form-control"> 
              <option>Draft</option>
              <option>Publish</option>
            </select> 
            </div>


      </div>
    </div>
  </div>
            



</div>


      @endsection