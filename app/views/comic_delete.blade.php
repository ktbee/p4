@extends('_master')

@section('title')
	'Delete comic'
@stop

@section('content')

	<h2>Are you sure you want to delete this comic?</h2>

	<div class="comic">
		<h2>{{ $comic->title }}</h2>
		<br>
		
		{{'<img src="'.url($comic->imageURL).'"/>'}}
		<br>
		<p>
			{{ $comic->caption }} 
		</p>
		<br>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<button><a href={{url('/comic/')}}>Return to home</a></button>
		</div>
		<div class="col-lg-6">
			{{ Form::open(['method' => 'DELETE', 'action' => ['ComicController@destroy', $comic->id]]) }}
				<a href='javascript:void(0)' onClick='parentNode.submit();return false;'><button>Delete comic<button></a>
			{{ Form::close() }}
		</div>
	</div>

@stop