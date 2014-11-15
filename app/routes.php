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
Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('/', function()
{
	//return View::make('hello');
	echo "comic home page";
});

Route::post('/', function()
{
	// for login form
});

Route::get('/list/{tag}', function($tag)
{
	echo "comic listing by tag ".$tag;
});

Route::get('/{username}/home', function($username)
{
	echo "This is the home of ".$username;
});

Route::get('/new', function()
{
	echo "create new comic here";
});

Route::post('/new', function()
{
	//to process new comic form
});

Route::post('/edit/{title}', function($title)
{
	//process form to edit comic post
});

Route::get('/{username}/list/{tag}', function($username, $tag)
{
	echo $username."'s comics listing by tag ".$tag;
});