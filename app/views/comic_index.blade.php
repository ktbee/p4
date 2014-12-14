@extends('_master')

@section('title')
	Welcome 
@stop

@section('content')
	<br>
	<div class="row">
		<div class="col-lg-6">
			<h3>Your latest comics</h3>
				
					@foreach($comics as $comic )
						
						@if($id==$comic['user_id'])
							<div class="comic center-block">
								<h2>{{ $comic['title']}}</h2>
								<br>
								{{'<img src="'.$comic['imageURL'].'">'}}
								<br>
								<br>
								<p>
									{{ $comic['caption'] }} 
								</p>
								<br>
								<button class="center-block"><a href={{url('/comic/'.$comic->id)}}>View this comic</a></button>
								<br>
							</div>
						@endif

					@endforeach
				
		</div> <!-- end row -->

		<div class="col-lg-6">
			<h3>User actions</h3>
			<br>
			<br>
			<a href={{url('/comic/create')}}>Click here to post a new comic</a>
			<br>
			<br>
			<a href={{url('/logout')}}>Log out</a>

			<br>
			
		</div>
	</div> <!-- end row -->

@stop