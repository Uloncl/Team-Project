<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>
		<script src="{{ asset('js/app.js') }}" ></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
		<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		
		<script src="https://kit.fontawesome.com/3b3d7324d5.js" crossorigin="anonymous"></script>
	</head>
	<body class="bg-light">
		<div id="app">
			<x-navbar/>
			{{ $slot }}
			<x-footer/>
		</div>
		<x-flash/>
	</body>
</html>
