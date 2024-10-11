<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Parvez Ahmed" />
    <meta name="robots" content="index, follow">

    <!-- SEO Meta Tags -->
    <meta name="description" content="TARPOR is a cutting-edge platform providing innovative solutions for businesses and individuals alike. Join us to revolutionize the way you work and interact with technology.">
    <meta name="keywords" content="TARPOR, business solutions, innovation, technology, productivity, platform, tarpor.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>Tarpor | @yield('title', 'Shop Online, Save Time')</title>


    <!-- Favicon and Icons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('logos/tred.svg') }}?v=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logos/tred.svg') }}?v=1.0">
    <link rel="icon" sizes="192x192" href="{{ asset('logos/tred.svg') }}?v=1.0">

    <!-- Open Graph (OG) Meta Tags for Social Sharing -->
    <meta property="og:title" content="{{ config('app.name', 'T A R P O R') }}">
    <meta property="og:description" content="A short description of the page for social media sharing.">
    <meta property="og:image" content="{{ asset('logos/tred.svg') }}?v=1.0">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name', 'T A R P O R') }}">
    <meta name="twitter:description" content="A short description for Twitter sharing.">
    <meta name="twitter:image" content="{{ asset('logos/tred.svg') }}?v=1.0">

    <!-- Fonts -->
    <link rel="preload" href="https://fonts.bunny.net/css?family=Nunito" as="style">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styling (if needed) -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Your custom CSS file -->

    <!-- Additional JavaScript Files (if needed) -->
    <script src="{{ asset('js/custom.js') }}" defer></script> <!-- Your custom JS file -->
</head>
<body class="bg-gray-50">
{{--<div id="app">--}}
