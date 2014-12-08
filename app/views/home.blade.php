@extends('_master')

@section('title')
	'Comic Blog | Welcome'
@stop

@section('content')
	@if(Auth::check())
		<h1>comic home page</h1>
		<br>
		<br>
		<h3>Check out some of the latest comics</h3>
		<div>Comics go here</div>
	@else
		<h2>Login below</h2>
		<br>
		{{ Form::open(array('url' => '/')) }}
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username') }}
		<br>
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
		<br>
		{{ Form::submit('Save') }}
		{{ Form::close() }}
	<br>
	<br>
	<a href={{url('/signup')}}><h3>Or sign up here</h3></a>
	<br>
	@endif
@stop