<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Post;

use Sentinel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Sentinel::check()){

            $id = Sentinel::getUser()->id;
            $post = Post::whereUserId($id)->first();
            //dd($posts);
            return view('post.index',compact('post'));

        }
        
    }

    public function others()
    {

        if(Sentinel::check()){

           // $id = Sentinel::getUser()->id;
            //$posts = Post::where('status','draft');
            $posts = Post::latest()->publish()->public()->paginate(5);

            //dd($posts);
            return view('post.others',compact('posts'));

        }
        
    }

    public function showOthers($id){
    //
        //dd($id);

         $post = Post::whereId($id)->first();

         //dd($post->id);

        return response()->json([
                    'id'=>$post->id,
                     'title'=>$post->title,
                     'content'=>$post->content
                ]);
    }

    public function showOtherPost($id){

        //dd($id);

         $post = Post::whereId($id)->first();

         //dd($post->id);

        return view('post.otherShow',compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         if(Sentinel::check()){

            $id = Sentinel::getUser()->id;
            
            if(Post::whereUserId($id)->first()){
                return redirect()->back()->withErrors('Only one story allowed!');
            }else{
                return view('post.create');
            }

        
        
          } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
        'title' => 'required|min:3|max:255',
        'content' => 'required',
        ]);

        if(Sentinel::check()){
            $id = Sentinel::getUser()->id;
             //$id = Sentinel::getUser()->id;
            //$userid = User::whereId($id)->firstOrFail();

            //dd($id);


            $story = new Post;
            $story->title = $request->input('title');
            $story->content = $request->input('content');
            $story->status = $request->input('status');
            $story->privacy = $request->input('privacy');
            $story->user_id =  $id;
            $story->save();
         
         return redirect('story/')->with('status','Create Story Successful !');
       
       }else
      
       return redirect()->back()->withErrors('Create Story Failed !');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        if(Sentinel::check()){
            $id = Sentinel::getUser()->id;

            $post = Post::whereUserId($id)->first();
        
            return view('post.edit',compact('post'));
        }

        //return view('post.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //dd($request);
        
        if(Sentinel::check()){
           
            $id = Sentinel::getUser()->id;

            $post = Post::whereUserId($id)->first();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->status = $request->status;
            $post->privacy = $request->privacy;
            $post->save();


        return redirect()->back()->with('status','Update Story Successful !');
       
       }else
      
       return redirect()->back()->withErrors('Update Story Failed !');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //dd($id);
        $post = Post::destroy($id);
        return redirect()->route('post.index')->with('status','Successful Deleted    ');
    }
}
