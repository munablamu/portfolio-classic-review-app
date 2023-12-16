<!doctype html>
@php
  $theme = session('theme', 'light');
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $theme }}">
  <head>
    <meta charset='utf-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}{{ isset($title) ? '|' . $title : '' }}</title>

    <link rel="icon" href="{{ logo_url('ico') }}">
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/c677d29c82.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Lobster&family=Ubuntu:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="flex flex-col min-h-screen font-sans bg-slate-125 text-slate-600 dark:bg-slate-700 dark:text-slate-250 md:antialiased">
    <x-common.header />
    <x-common.session_feedback />
    <div class="flex-grow pt-16 relative w-full max-w-[60rem] mx-auto">
      {{ $slot }}
    </div>
    <x-common.footer class="w-full fixed bottom-0" />
  </body>
<html>
