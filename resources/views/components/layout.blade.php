<!doctype html>
<html lang='ja'>
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Classic Music Review App' }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      body { font-size: 16pt; color: #555; }
      h1 { font-size: 100pt; font-weight: bold; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
    </style>
  </head>
  <body>
    {{ $slot }}
  </body>
<html>
