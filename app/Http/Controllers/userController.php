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
    	return redirect()->route('login');
    }

    public function updateProfile()
    {
        $user = auth()->user();

        $user->name = request('name');
        $user->email = request('email');

        $user->save();

        session()->flash('message','Profile Updated');

         return redirect()->route('home');
    }

    public function userProfile($id)
    {
        $user = User::find($id);       
        return view('user.profile',['user'=>$user]);
    }

}
