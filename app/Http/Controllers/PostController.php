<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;
use Auth;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(Posts $posts)
    {

       $posts = $posts->all();

    	return view('posts.index', compact("posts"));
    }

    public function show(Post $post)
    {
    	return view('posts.show',compact("post"));
    }

    public function create()
    {
    	return view('posts.create');
    }
    

     public function edit(Post $post)
    {
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        return view('posts.edit',compact("post"));
    
    }


      public function update(Post $post)
    {
       $this->validate(request() ,[
            'title'=>'required',
            'body'=>'required'
        ]);
       $post->body = request('body');
       $post->title = request('title');
       $post->updated_at = Carbon::now();
       $post->update();
       return redirect()->home();
    }


     public function store()
    {

    	$this->validate(request() ,[
    		'title'=>'required',
    		'body'=>'required'
    	]);
            auth()->user()->publish(
            new Post(request(['title','body','img_path']))
            );
    	return redirect()->home();
    }

        public function destroy($id)
    {        
        $post = Post::find($id);
        if(Auth::user() != $post->user){
            return redirect()->back();
        }

        $post->delete();
        return redirect()->home();

    }

}
