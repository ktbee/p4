@extends('_master')

@section('title')
	'Comic Blog | Welcome'
@stop


@section('content')
	<div class="comic">
		<h2>{{ $comic->title }}</h2>
		<br>
		
		{{'<img src="'.url($comic->imageURL).'"/>'}}
		<br>
		<p>
			{{ $comic->caption }} 
		</p>
		<br>
	
		<div class="row">
			<div class="col-lg-6">
				<button class="btn btn-large btn-success"><a href={{url('/comic/'.$comic->id.'/edit')}}>Edit comic</a></button>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-large btn-warning"><a href={{url('/comic/'.$comic->id.'/delete')}}>Delete comic</a></button>
			</div>
		</div>
	</div> <!-- end class comic -->
<br>
<br>

	

@stop
