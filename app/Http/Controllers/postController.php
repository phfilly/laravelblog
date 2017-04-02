<?php

namespace App\Http\Controllers;

use App\Post;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class postController extends Controller
{

   	public function __construct()
   	{
   		$this->middleware('auth')->except(['all', 'show']);
   	}

    public function init()
    {
    	
    }

   	public function createPost()
   	{
   		return view('posts.create');
   	}

   	public function viewAllPosts()
   	{	
   		//$posts = DB::table('posts')->get();

   		/*$posts = DB::table('posts')
   					->select('')
   					->join('users','users.id','=','posts.user_id')
   					->get();*/

   		//$posts = Post::with('posts')->get();
   		$posts = Post::orderBy('id','desc')->paginate(5);

   		return view('welcome', ['posts' => $posts]);
   	}

   	public function savePost()
   	{
   		$this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => \Auth::user()->id       
        ]);

        session()->flash('message','Post Saved!');

        return redirect()->route('home');
   	}

   	public function viewPost($id)		//view single post
   	{	
   		$post = Post::find($id);		//Post == model
   		return view('posts.view',['post'=>$post]);
   	}

   	public function postManager()
   	{
   		$posts = DB::table('posts')
   				->where('user_id','=',\Auth::user()->id)
   				->get();

   		return view('welcome', ['posts' => $posts]);
   	}

   	public function editPost($id)
   	{	
   		$post = Post::find($id);
   		return view('posts.edit',['post'=>$post]);
   	}

   	public function updatePost($id)
   	{	
   		$this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');

        $post->save();

   		session()->flash('message','Post Edited');
   		return view('posts.view',['post'=>$post]);
   	}

   	public function deletePost($id)
   	{	
   		$post = Post::find($id);
   		$post->delete();

   		session()->flash('message','Post Deleted');
   		$posts = DB::table('posts')->get();
   		return view('welcome', ['posts' => $posts]);
   	}
}
