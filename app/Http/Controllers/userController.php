<?php

namespace App\Http\Controllers;

use DB;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function viewProfile()
    {
        return view('user.dashboard');
    }

    public function init()
    {
    	
    }

    public function logout()
    {
    	auth()->logout();
    	return redirect()->route('login.login');
    }

    public function updateProfile()
    {
        $user = auth()->user();

        $user->name = request('name');
        $user->email = request('email');

        $user->save();

        session()->flash('message','Profile Updated');

        $posts = DB::table('posts')->get();
        return view('welcome', ['posts' => $posts]);
    }

    public function userProfile($id)
    {
        //$user = User::find($id);       
        $user_posts = Post::where('user_id','=',$id)->orderBy('created_at','desc');

        return view('user.profile',['user_posts'=>$user_posts]);
    }

}
