@extends('_master')

@section('title')
	Welcome 
@stop

@section('content')
	<br>
	<div class="row">
		<div class="col-lg-6">
			<h3>Your latest comics</h3>

			@foreach($comics as $comic)
			<section class='comic'>

				<h2>{{ $comic['title'] }}</h2>

				{{'<img src="'.$comic['imageURL'].'"/>'}}

				<p>
					{{ $comic['caption'] }} 
				</p>
			@endforeach
			
		</div> <!-- end row -->

		<div class="col-lg-6">
			<h3>Post a new comic</h3>

			<br>
			
		</div>
	</div> <!-- end row -->

@stop