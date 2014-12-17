<!DOCTYPE html>
<html>
<head>
	<meta charset='utf8'>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
	<link rel='stylesheet' href='{{url('css/custom.css')}}' type='text/css'>
	<!-- <link rel='stylesheet' href="{{public_path('css/custom.css')}}" type='text/css'> -->
	<title>
		@yield('title', 'Comic Blog')
	</title>
</head>
<body class="container">
	@if(Auth::check())
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id>
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#logged-in-nav">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href={{url('/')}}>Comic Blog</a>
	        </div>

	        <div class="collapse navbar-collapse" id="logged-in-nav">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href={{url('/comic')}}><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a></li>
	            <li class="active"><a href={{url('/comic/create')}}><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Post a comic</a></li>
	            <li class="active"><a href={{url('/logout')}}><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;Log out</a></li>
	          </ul>
	        </div><!-- /.navbar-collapse -->
	      </div>
    	</nav>
	@else 
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id>
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#guest-nav">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href={{url('/')}}>Comic Blog</a>
	        </div>

	        <div class="collapse navbar-collapse" id="guest-nav">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href={{url('/signin')}}><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;sign in</a></li>
	          </ul>
	        </div><!-- /.navbar-collapse -->
	      </div>
    	</nav>
	@endif

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	@yield('content')

	

</body>

</html>