<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>YPF ADMIN</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link href="http://youpornflix.com/ypf/public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	@yield('page-css')

	<link rel="stylesheet" type="text/css" href="http://youpornflix.com/ypf/public/dist/css/sb-admin-2.css">

	<body>
		<div id="wrapper">
		@include('nav')

			<div id="page-wrapper">
			@yield('content')
			</div>

		</div>
	</body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	@yield('page-javascripts')

    <!-- Custom Theme JavaScript -->
    <script src="http://youpornflix.com/ypf/public/dist/js/sb-admin-2.js"></script>
</body>
</html>
