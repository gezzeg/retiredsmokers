@extends('layouts.master')

@section('title', 'Members Story')


@section('content')



 <div class="row">


        @include('post.shared.side')  
     
   

    <div class="col-md-6">
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">
              {{$post->user->first_name}} Story  
              
              {{-- Check if post null --}}
              @if (count($post)==0)
              @else
               {{--  <span class="badge" data-toggle="tooltip" data-placement="top" title="This post is {{ $post->status }}.">{{ $post->status }}</span>
                <span class="badge" data-toggle="tooltip" data-placement="top" title="This post is {{ $post->privacy }}.">{{ $post->privacy }}</span> --}}
              @endif                

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
          @if (count($post)==0)

            <p class="text-center">There is no story from you. Imagine how your story on quit smoking will inspire others...</p>

            <p class="text-center"><a href="{{ url('story/create') }}" class="btn btn-default">Create Now
            </a></p>
                      
          @else
            
           
                     <p>Created at {{ $post->created_at}}. <br>Last update at {{ $post->user->updated_at }}.
                     </p> 
                      
            <div class="panel panel-default">
              <div class="panel-body">
                 <h3>{{ $post->title }}</h3> 
                {!! $post->content !!}
                
              </div>
              </div>
                     
            
                      

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

            @if (is_null($post))
              @else

        <div class="form-group">
          <span class="glyphicon glyphicon-thumbs-up"></span> 200 like your story.
        </div>  

        <div class="form-group">
          <span class="glyphicon glyphicon-star"></span> 20 people rate 3 star your story.
        </div>  

        <div class="form-group">
        <span class="glyphicon glyphicon-eye-open"></span> 100 have read your story.
                   
        </div>
 
       
         @endif  

      </div>
    </div>
  </div>
            



</div>


      @endsection