<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Portfolio') - {{ config('app.name') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-slate-900">
  @include('layouts.public.header')

  <main>
    @yield('content')
  </main>

  @include('layouts.public.footer')
</body>
</html>
