@extends('_master')

@section('title')

@stop

@section('content')
	<h1>Welcome back !</h1>
	<br>
	<h3>Post a new comic</h3>
	<br>
	{{ Form::open(array(
		'url' => '/comic',
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
		{{ Form::label('tag1', 'Tag your comic') }}
		{{ Form::textarea('tag1') }}
		<br>
		{{ Form::label('tag2', 'Add a second tag') }}
		{{ Form::textarea('tag2') }}
		<br>
		{{ Form::label('tag3', 'And a third tag, if you like') }}
		{{ Form::textarea('tag3') }}
		<br>
		{{ Form::submit('Create your comic!') }}

	{{ Form::close() }}

@stop