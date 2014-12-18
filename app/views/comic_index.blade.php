@extends('_master')

@section('title')
	{{$username}}| home 
@stop

@section('content')
	<h2>{{$username}}'s comics home</h2>
	
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
					<button class="center-block btn btn-lg btn-success"><a href={{url('/comic/'.$comic->id)}}> this comic</a></button>
					<br>
					<p>Tags: 
						@if(isset($comic->tag))
						@foreach ($comic->tag as $tag)
						  {{ $tag->name.", " }}
						@endforeach
						@else 
							{{" no tags added yet"}}
						@endif
					</p>
				</div>
				<br>
				<br>
			@endif
		@endforeach

@stop