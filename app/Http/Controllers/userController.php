<?php

namespace App\Http\Controllers;

use DB;
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

    	return view('login.login');
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

}
