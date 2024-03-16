<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title inertia>{{ config('app.name', 'App') }}</title>

		<!-- Fonts -->
		{{-- Favicon --}}
		<link rel="icon" href="{{ url('uploads/site/favicon.png') }}">
		<link rel="shortcut icon" href="{{ url('uploads/site/favicon.png') }}" type="image/x-icon">
		<link rel="apple-touch-icon" href="{{ url('uploads/site/logo.png') }}">

		<!-- Scripts -->
		@routes
		@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
		@inertiaHead


</head>

<body class="bg-dark text-dark font-sans antialiased">
		@inertia

		{{-- Translations --}}
		<x-translation></x-translation>

</body>

</html>
