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
		<br>
			@foreach($comics as $comic )
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
					<button class="center-block btn btn-lg btn-success"><a href={{url('/comic/'.$comic->id)}}> this comic</a></button>
					<br>
					<p>Tags: 
						@foreach ($comic->tag as $tag)
						  {{ $tag->name.", " }}
						@endforeach
					</p>
				</div>
				<br>
				<br>
		@endforeach
	@else
		<div class="center-block index">
			<h2>Log in below</h2>
			<br>
			{{ Form::open(array('url' => 'login', 'class' => 'input-group')) }}
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username') }}
				<br>
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password') }}
				<br>
				<br>
				{{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-success']) }}
			{{ Form::close() }}
		<br>
		<br>
		<a href={{url('/signup')}}><h3>Or sign up here</h3></a>
		<br>
	</div>
	@endif
@stop