<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">
  <div class="min-h-screen flex">

    {{-- Sidebar (PC) --}}
    <div class="hidden lg:block lg:w-64 lg:shrink-0">
      @include('layouts.admin.sidebar')
    </div>

    <div class="flex-1 flex flex-col min-w-0">
      @include('layouts.admin.header')

      <main class="flex-1">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
          @include('layouts.admin.flash')

          {{-- ページ見出し --}}
          <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
              <h1 class="text-xl sm:text-2xl font-semibold leading-tight">
                @yield('page_title', 'Dashboard')
              </h1>
              @hasSection('page_description')
                <p class="mt-1 text-sm text-slate-600">@yield('page_description')</p>
              @endif
            </div>

            {{-- ページ右上のアクションボタン領域 --}}
            <div class="flex items-center gap-2">
              @yield('page_actions')
            </div>
          </div>

          @yield('content')
        </div>
      </main>

      @include('layouts.admin.footer')
    </div>
  </div>
</body>
</html>
