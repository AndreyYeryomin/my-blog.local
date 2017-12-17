<?php


Route::get('/', 'PostController@index')->name('home');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts-delete/{id}', 'PostController@destroy');
Route::get('/posts-edit/{post}', 'PostController@edit');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/reg', 'RegController@create');
Route::get('/login', 'SessionsController@create')->name('login');
Route::get('/logout', 'SessionsController@destroy');

Route::post('/posts-update/{post}/', 'PostController@update');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/comments', 'CommentController@store');
Route::post('/reg', 'RegController@store');
Route::post('/login', 'SessionsController@store');
