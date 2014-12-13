<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function(){
    $comics = Comic::all();

    return View::make('index')->with('comics',$comics);
});


/**
* User
* 
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );



/**
* CRUD Comics
* 
*/

Route::get('/comic', 'ComicController@getIndex');
Route::get('/comic/create', 'ComicController@getCreate');
Route::post('/comic', 'ComicController@postStore');
Route::get('/comic/{comic_id}', 'ComicController@show');
Route::get('/comic/{comic_id}/edit', 'ComicController@edit');
Route::put('/comic/{comic_id}', 'ComicController@update');
Route::delete('/comic/{comic_id}', 'ComicController@destroy');

