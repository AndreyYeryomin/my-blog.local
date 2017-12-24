<?php


Route::get('/', 'PostController@index')->name('home');

Route::get('/posts/create', 'PostController@create')->middleware('auth');

Route::get('/posts-delete/{id}', 'PostController@destroy')->middleware('auth');

Route::get('/posts-edit/{post}', 'PostController@edit')->middleware('auth');

Route::get('/posts', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');

Route::get('/reg', 'RegController@create');

Route::get('/login', 'SessionsController@create')->name('login')->middleware('guest');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/words', 'WordController@index')->middleware('auth');

Route::post('/words/create', 'WordController@store')->middleware('auth');

Route::post('/words/delete', 'WordController@destroy')->middleware('auth');

Route::post('/posts-update/{post}/', 'PostController@update')->middleware('auth');

Route::post('/posts', 'PostController@store')->middleware('auth');

Route::post('/posts/{post}/comments', 'CommentController@store')->middleware('auth');

Route::post('/posts/{post}/likes', 'LikesController@store')->middleware('auth');

Route::post('/posts/{post}/dislikes', 'DislikesController@store')->middleware('auth');

Route::post('/reg', 'RegController@store');

Route::post('/login', 'SessionsController@store')->middleware('guest');
