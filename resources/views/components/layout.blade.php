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

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/c677d29c82.js" crossorigin="anonymous"></script>
    <!--
    <style>
      body { font-size: 16pt; color: #555; }
      h1 { font-size: 100pt; font-weight: bold; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
    </style>
    -->
  </head>
  <body class="flex flex-col min-h-screen bg-slate-150 text-slate-800 md:antialiased">
    <x-common.header />
    <x-common.session_feedback />
    <div class="flex-grow pt-16 relative w-full max-w-[60rem] mx-auto">
      {{ $slot }}
    </div>
    <x-common.footer class="w-full fixed bottom-0" />
  </body>
<html>
