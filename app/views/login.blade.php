@extends ('_master')


@section('title')
	Login | Welcome back
@stop

@section('content')
	<h3>Please log in to continue</h3>
	<br>
	<br>
	{{ Form::open(array('url' => '/login')) }}

	    {{ Form::label('username', 'Username') }}<br>
	    {{ Form::text('username') }}<br><br>

	    {{ Form::label('password', 'Password') }}<br>
	    {{ Form::password('password') }}<br><br>

	    {{ Form::submit('Submit') }}

	{{ Form::close() }}

@stop