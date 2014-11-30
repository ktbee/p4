@extends('_master')

@section('title')
	'Comic Blog | Welcome'
@stop

@section('content')
	<h1>comic home page</h1>
	<br>
	<br>
	<h3>Login below</h3>
	{{ Form::open(array('url' => '/')) }}
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username') }}
		<br>
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email') }}
		<br>
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
		<br>
		{{ Form::submit('Save') }}
	{{ Form::close() }}
	<br>
	<br>
	<h3>Check out some of the latest comics</h3>
	<div>Comics go here</div>
@stop