<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=AnjJYWrg1k5GYbX6LTEzzoa6fJnBE0fWTLdDGfqvBcI6m5-9512OFRlW7FdkHuvF'></script>

	<title>{{ $view_name }}</title>
	<script src="{{ asset('js/app.js') }}" ></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
	<body>
		<div id="app">
			{{ $navbar }}
			{{ $content }}
		</div>
	</body>
</html>
