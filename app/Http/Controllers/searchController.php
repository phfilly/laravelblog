<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class searchController extends Controller
{
    //

    public function search()
    {
    	$search = request('search');

    	$posts = Post::where('title','LIKE','%'.$search.'%')
    					->orWhere('body','LIKE','%'.$search.'%')
    					->orderBy('created_at','desc')
    					->paginate(5);

    	if(count($posts) > 0)
    		return view('welcome',['posts' => $posts])->withDetails($posts)->withQuery($search);
    	else
    		return view('welcome')->withMessage("No results found. Please try again");


    }
}
