<?php


Route::get('/', 'PostController@index')->name('home');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/comments', 'CommentController@store');
Route::get('/posts/{post}', 'PostController@show');



Route::get('/reg', 'RegController@create');
Route::post('/reg', 'RegController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');