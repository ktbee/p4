@extends('_master')

@section('title')
	'Delete comic'
@stop

@section('content')
<br>
	<h2>Are you sure you want to delete this comic?</h2>
	<br>
	<br>
	<div class="comic">
		<h2>{{ $comic->title }}</h2>
		<br>
		
		{{'<img src="'.url($comic->imageURL).'"/>'}}
		<br>
		<p>
			{{ $comic->caption }} 
		</p>
		<br>
		{{ Form::open(['method' => 'DELETE', 'action' => ['ComicController@destroy', $comic->id]]) }}
			<a href='javascript:void(0)' onClick='parentNode.submit();return false;'><button class="btn btn-lg btn-warning center block">Yes, delete comic<button></a>
		{{ Form::close() }}
	</div> <!-- end class comic -->
<br>
<br>

@stop