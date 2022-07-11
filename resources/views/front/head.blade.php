<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- TODO: title тоже должен тянуться с админки --}}
    <title>Global Verst</title>
    <!-- Styles -->
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}">
</head>
<body>
    <div class="wrapper">