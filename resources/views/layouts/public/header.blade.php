<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/80 backdrop-blur">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="h-14 flex items-center justify-between gap-3">
      <a href="{{ route('home') }}" class="font-semibold tracking-tight">
        {{ config('app.name') }}
      </a>

      <nav class="flex items-center gap-2">
        <a href="{{ route('works.index') }}"
           class="rounded-md px-3 py-2 text-sm font-medium hover:bg-slate-50 {{ request()->routeIs('works.*') ? 'text-slate-900' : 'text-slate-600' }}">
          Works
        </a>

        @auth
          <a href="{{ route('portfolios.index') }}"
             class="rounded-md px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
            Admin
          </a>
        @endauth
      </nav>
    </div>
  </div>
</header>
