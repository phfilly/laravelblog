<?php

Route::get('/', function () {});	//home directory


Route::get('/login', function () {
		   return view('login.login');	   
});	//home directory

Route::get('/user','userController@init');	//home directory
Route::get('/posts','postController@init');	//home directory


