<?php

Route::get('/','postController@viewAllPosts');
Route::get('/home','postController@viewAllPosts')->name('home');
Route::post('/home','postController@viewAllPosts');

//******************* LOGIN & REGISTER ************************/

Route::get('/login','Auth\LoginController@login')->name('login');

Route::post('/dashboard','Auth\LoginController@dashboard');															//user profile after login
Route::get('/my-dashboard',['as' => 'my-dashboard','uses' => 'userController@viewProfile']);						//user profile get	
Route::post('/my-dashboard','userController@updateProfile');

Route::get('/logout','userController@logout');													
Route::get('/register','Auth\RegisterController@register');
Route::post('/register','Auth\RegisterController@save');

Route::get('/user','userController@init');	
Route::get('/user/{user}','userController@userProfile');	
//******************* LOGIN & REGISTER END ************************/

//************************* POSTS *************************/
	
Route::get('/post','postController@viewAllPosts');	
Route::get('/post/create','postController@createPost');	

Route::get('/posts/{posts}','postController@viewPost');							//view single post
Route::post('/posts/{posts}','postController@updatePost');						//update post
Route::post('/posts/{posts}','postController@deletePost');						//delete post

Route::post('/post','postController@store');	
Route::get('/post/my-posts','postController@postManager');	

Route::get('/posts/edit-my-post/{posts}','postController@editPost');	
Route::get('/posts/edit/{posts}','postController@editPostAjax');				//ajax EDIT call
Route::put('/posts/edit/{posts}','postController@updatePostAjax');				//ajax UPDATE call	
Route::delete('/posts/{posts}','postController@deletePostAjax');				//ajax DELETE call	

//************************* POSTS END *********************/

Route::post('/search','searchController@search');	

//******************* CATEGORY ************************/

Route::get('/category/create','categoryController@create');
Route::post('/categories','categoryController@store');
Route::get('/categories','categoryController@show')->name('categories');	
Route::get('/categories/{category}','postController@showCategoryPosts');	
