@extends('_master')

@section('title')
	'Edit comic'
@stop

@section('content')
	
	<h2>Edit comic: {{$comic->title}}</h2>
	<br>
	<br>
	<br>
	<div>

	{{ Form::model($comic, ['method' => 'put', 
							'action' => ['ComicController@update', $comic->id], 
							'files' => true])}}
		{{ Form::label('title', 'Edit comic title') }}
		{{ Form::text('title') }}
		<br>
		<br>
		{{ Form::label('image', 'Upload new image') }}
    	{{ Form::file('image') }}
    	<br>
    	<br>
		{{ Form::label('caption', 'Edit caption') }}
		{{ Form::textarea('caption') }}
		<br>
		<br>
		{{ Form::submit('Update your comic!') }}

	{{ Form::close() }}
	</div>

@stop