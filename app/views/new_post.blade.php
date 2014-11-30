@extends('_master')

@section('title')

@stop

@section('content')
	<h1>Welcome back !</h1>
	<br>
	<h3>Post a new comic</h3>
	<br>
	{{ Form::open(array(
		'url' => 'comic/create',
		'files' => true
	)) }}
		{{ Form::label('title', 'Comic title') }}
		{{ Form::text('title') }}
		<br>
		{{ Form::label('image', 'Image') }}
    	{{ Form::file('image') }}
    	<br>
		{{ Form::label('caption', 'Comic caption') }}
		{{ Form::textarea('caption') }}
		<br>
		{{ Form::submit('Create your comic!') }}

	{{ Form::close() }}

@stop