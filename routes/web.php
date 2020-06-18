<?php

Route::get('/', 'HomeController@index');
Route::view('/about','about');
Route::view('/contact', 'contact');
Route::view('/news', 'news');

Route::get('contact','ContactsController@index');
Route::get('contact/create','ContactsController@create');
Route::post('contact','ContactsController@store');
Route::get('contact/{contacts}', 'ContactsController@show');
Route::get('contact/{contacts}/edit', 'ContactsController@edit');
Route::patch('contact/{contacts}', 'ContactsController@update');
Route::delete('contact/{contacts}', 'ContactsController@destroy');
// Route::post('contact',function(){
	// dd(request()->all());
// });