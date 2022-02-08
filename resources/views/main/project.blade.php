@extends('layouts.app')

@section('content')
	<main class="container">
		<div id="map">should be a map here</div>

		<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp4sNgTonXACL6BKvEjM1-RFliJNFC_PI&callback=initMap&v=weekly"
		async
		></script>
	</main>
@endsection
