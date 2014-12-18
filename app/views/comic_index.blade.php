@extends('_master')

@section('title')
	{{$username}}| home 
@stop

@section('content')
	<h2>{{$username}}'s comics home</h2>
	<br>
	<h3>Start posting some comics!</h3>
	
		@foreach($comics as $comic )
			@if($id==$comic['user_id'])
				<div class="comic">
					<h2>{{ $comic['title']}}</h2>
					<br>
					{{'<img src="'.$comic['imageURL'].'">'}}
					<br>
					<br>
					<p>
						{{ $comic['caption'] }} 
					</p>
					<br>
					<button class="center-block btn btn-lg btn-success"><a href={{url('/comic/'.$comic->id)}}>View this comic</a></button>
					<br>
					<p>Tags: 
						@foreach ($comic->tag as $tag)
						  {{ $tag->name.", " }}
						@endforeach
					</p>
				</div>
				<br>
				<br>
			@endif
		@endforeach

@stop