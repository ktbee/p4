<!DOCTYPE html>
<html>
<head>
	<meta charset='utf8'>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
	<title>
		@yield('title', 'Comic Blog')
	</title>
</head>
<body class="container">

	<h1>Welcome to Comic Blog</h1>
	<br>
	<br>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif


	@yield('content')

</body>

</html>