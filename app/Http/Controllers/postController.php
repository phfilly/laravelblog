<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
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
       $category = Category::orderBy('created_at', 'desc')->get();
   		 return view('posts.create', ['category' => $category]);
   	}

   	public function viewAllPosts()
   	{	
   	  $posts = Post::orderBy('created_at','desc')
                      ->where("status", "Active")
                      ->paginate(5);

      $category = Category::orderBy('created_at','desc')->get();

       return view('welcome', ['posts' => $posts,
                               'categories' => $category,
                               'category_name' => '']);
   	}

   	public function store(Request $request)
   	{
   		$this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);

      $imageName = "";
      if($request->image != null)
      {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
      }

      Post::create([
          'title' => request('title'),
          'body' => request('body'),
          'status' => request('status'),
          'categories_id' => request('category'),
          'pic' => $imageName,
          'user_id' => \Auth::user()->id       
      ]);

      session()->flash('message','Post Saved!');

      return redirect()->route('home');
   	}

    public function showCategoryPosts($id)
    {
      $posts = Post::orderBy('created_at','desc')
                      ->where("status","=","Active")
                      ->where("categories_id","=",$id)
                      ->paginate(5);

      $category = Category::orderBy('created_at','desc')->get();
      $category_name = Category::where('id','=',$id)->get();

      return view('welcome', ['posts' => $posts,
                              'categories' => $category,
                              'category_name'=>$category_name]);
    }

   	public function viewPost($id)		//view single post
   	{	
   		$post = Post::find($id);		
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
      $category = Category::orderBy('created_at','desc')->get();

   		return view('posts.edit',['post'=>$post,'category' => $category]);
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
