<?php

//Homepage and show individual recipes
route::get('/', 'PostController@index')->name('home');
route::get('/post/{post}','PostController@show');

//Admin pages
route::get('/login', 'SessionsController@create')->name('login');
route::get('/create','PostController@create');
route::get('/logout','SessionsController@destroy');
route::get('/edit/{post}','PostController@edit');
route::get('/adminindex','PostController@adminindex')->name('adminHome');
route::get('/delete/{post}','PostController@delete');


//Submit new recipe
route::post('/create', 'PostController@store');

//Submit login form
route::post('/adminindex', 'SessionsController@store');

//Submit edit form
route::Post('/edit/{post}','PostController@update');
