<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/app.css">
		<title>{{ config('app.name', 'Team Project')  }}</title>
	</head>
	<body>
		@yield('content')
	</body>
</html>
