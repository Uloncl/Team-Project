<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>
		<script src="{{ asset('js/app.js') }}" ></script>
		<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	</head>
	<body class="bg-dark">
		<div id="app">
			<x-navbar/>
			{{ $slot }}
			<x-footer/>
		</div>
		<x-flash/>
	</body>
</html>
