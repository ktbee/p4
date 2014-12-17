@extends('_master')

@section('title')

@stop

@section('content')
	<br>
	<h2>Post a new comic</h2>
	<br>
	@foreach($errors->all() as $message)
		<div class='error'>{{ $message }}</div>
	@endforeach
	<br>
<div class="row">
	<div class="col-lg-offset-1 col-lg-5">
	{{ Form::open(array(
		'url' => '/comic',
		'files' => true
	)) }}
		{{ Form::label('title', 'Comic title') }}
		<br>
		{{ Form::text('title') }}
		<br>
		<br>
		{{ Form::label('image', 'Image') }}
		<br>
    	{{ Form::file('image', ['class' => 'btn']) }}
    	
    	<br>
		{{ Form::label('caption', 'Comic caption') }}
		<br>
		{{ Form::textarea('caption') }}
		<br>
		<br>
	</div>
	<div class="col-lg-6">
		{{ Form::label('tag1', 'Tag your comic') }}
		<br>
		{{ Form::text('tag1') }}
		<br>
		<br>
		{{ Form::label('tag2', 'Add a second tag') }}
		<br>
		{{ Form::text('tag2') }}
		<br>
		<br>
		{{ Form::label('tag3', 'And a third tag, if you like') }}
		<br>
		{{ Form::text('tag3') }}
		<br>
		<br>
		{{ Form::submit('Create your comic!', ['class' => 'btn btn-lg btn-success pull-left']) }}
	{{ Form::close() }}
	</div>
</div> <!-- end row -->


@stop