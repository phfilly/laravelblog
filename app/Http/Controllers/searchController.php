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
        $orderBy = request('orderBy');

        if($search == '' || $search == null)
        {
            $posts = Post::where('status','=','Active')
                        ->orderBy('created_at',$orderBy)
                        ->paginate(5);
        }
        else
        {
	        $posts = Post::where('title','LIKE','%'.$search.'%')
                        ->where('status','=','Active')
    					->orWhere('body','LIKE','%'.$search.'%')
    					->orderBy('created_at',$orderBy)
    					->paginate(5);
        }

    	if(count($posts) > 0)
    		return view('welcome',['posts' => $posts,'orderBy' => $orderBy])->withDetails($posts)->withQuery($search);
    	else
    		return view('welcome')->withMessage("No results found. Please try again");


    }
}
