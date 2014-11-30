@extends('_master')

@section('title')
	Welcome {{{$username}}}
@stop

@section('content')
	<h1>Welcome back {{{$username}}}!</h1>
	<br>
	<h3>Post a new comic</h3>
	<br>
	<h3>Your latest comics</h3>

@stop