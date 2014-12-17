@extends ('_master')


@section('title')
	Sign up!
@stop

@section('content')
	<br>
	@foreach($errors->all() as $message)
		<div class='error'>{{ $message }}</div>
	@endforeach
	<br>
	{{ Form::open(array('url' => '/signup')) }}

	    {{ Form::label('username', 'Create your new username') }}<br>
	    {{ Form::text('username') }}<br><br>

	    {{ Form::label('email', 'Email') }}<br>
	    {{ Form::text('email') }}<br><br>

	    {{ Form::label('password', 'Choose a password with a minimum of 8 digits') }}<br>
	    {{ Form::password('password') }}<br><br>

	    {{ Form::submit('Submit') }}

	{{ Form::close() }}

@stop