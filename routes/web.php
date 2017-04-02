<?php

Route::get('/','postController@viewAllPosts');
Route::get('/home',['as' => 'home','uses' => 'postController@viewAllPosts']);

Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/dashboard','Auth\LoginController@dashboard');															//user profile after login
Route::get('/my-dashboard',['as' => 'my-dashboard','uses' => 'userController@viewProfile']);						//user profile get	
Route::post('/my-dashboard','userController@updateProfile');														//user profile update		


Route::get('/register','Auth\RegisterController@register');
Route::post('/register','Auth\RegisterController@save');

Route::get('/user','userController@init');	
	
Route::get('/post','postController@viewAllPosts');	
Route::get('/post/create','postController@createPost');	

Route::get('/posts/{posts}','postController@viewPost');						//view single post
Route::post('/posts/{posts}','postController@updatePost');					//update post
Route::post('/posts/{posts}','postController@deletePost');					//delete post
Route::get('/posts/edit/{posts}','postController@editPost');	

Route::post('/post','postController@savePost');	
Route::get('/post/my-posts','postController@postManager');	

Route::get('/logout','userController@logout');


