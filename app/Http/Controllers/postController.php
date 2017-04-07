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
   		/*$posts = DB::table('posts')
   					->select('')
   					->join('users','users.id','=','posts.user_id')
   					->get();*/

   	  $posts = Post::orderBy('created_at','desc')
                      ->where("status","=","Active")
                      ->paginate(5);

   		return view('welcome', ['posts' => $posts]);
   	}

   	public function savePost(Request $request)
   	{
   		$this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

      $imageName = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('images'), $imageName);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'status' => request('status'),
            'pic' => $imageName,
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
   		/*$posts = DB::table('posts')
   				->where('user_id','=',\Auth::user()->id)
   				->get();*/

      $posts = Post::where('user_id','=',\Auth::user()->id)->orderBy('created_at','desc')->paginate(5);

   		return view('posts/author_posts', ['posts' => $posts]);
   	}

   	public function editPost($id)
   	{	
   		$post = Post::find($id);
   		return view('posts.edit',['post'=>$post]);
   	}

    public function editPostAjax($id)
    {
      $post = Post::find($id);
      return response()->json($post);
    }

    public function updatePostAjax($id)
    {
      $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');
        $post->status = request('status');

        $post->save();

      session()->flash('message','Post Edited');
      return response()->json($post);
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
        $post->status = request('status');

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

    public function deletePostAjax($id)
    {
      $post = Post::find($id);
      $post->delete();

      session()->flash('message','Post Deleted');
      return response()->json($post);
    }
}
