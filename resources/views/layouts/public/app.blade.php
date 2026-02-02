<!doctype html>
<html lang="ja">
<head>
  {{-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Portfolio') - {{ config('app.name') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
   {{-- Basic meta --}}
  <title>@yield('meta_title', trim($__env->yieldContent('title', 'Portfolio')).' - '.config('app.name'))</title>
  <meta name="description" content="@yield('meta_description', 'Laravel 12で作成したポートフォリオサイトです。')">
  {{-- <meta name="robots" content="@yield('meta_robots', 'index,follow')"> --}}
  <meta name="robots" content="@yield('meta_robots', 'noindex,nofollow')">

  {{-- Canonical --}}
  <link rel="canonical" href="@yield('meta_canonical', request()->fullUrl())">

  {{-- OGP --}}
  <meta property="og:site_name" content="{{ config('app.name') }}">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title', 'Portfolio')).' - '.config('app.name'))">
  <meta property="og:description" content="@yield('og_description', 'Laravel 12で作成したポートフォリオサイトです。')">
  <meta property="og:url" content="@yield('og_url', request()->fullUrl())">
  <meta property="og:image" content="@yield('og_image', asset('ogp.png'))">

  {{-- Twitter --}}
  <meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')">
  <meta name="twitter:title" content="@yield('twitter_title', trim($__env->yieldContent('title', 'Portfolio')).' - '.config('app.name'))">
  <meta name="twitter:description" content="@yield('twitter_description', 'Laravel 12で作成したポートフォリオサイトです。')">
  <meta name="twitter:image" content="@yield('twitter_image', asset('ogp.png'))">

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
