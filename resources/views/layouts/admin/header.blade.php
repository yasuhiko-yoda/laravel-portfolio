<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur">
  <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="h-14 flex items-center justify-between gap-3">

      {{-- Mobile menu (details) --}}
      <details class="relative lg:hidden">
        <summary class="list-none inline-flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 hover:bg-slate-50 cursor-pointer">
          <span class="sr-only">メニュー</span>
          {{-- hamburger --}}
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </summary>

        {{-- drawer --}}
        <div class="absolute left-0 mt-2 w-72 rounded-xl border border-slate-200 bg-white shadow-lg overflow-hidden">
          <div class="px-4 py-3 border-b border-slate-200">
            <div class="text-sm font-semibold">{{ config('app.name') }}</div>
            <div class="text-xs text-slate-600">Admin</div>
          </div>
          <nav class="p-2">
            <a href="{{ route('portfolios.index') }}"
               class="block rounded-md px-3 py-2 text-sm hover:bg-slate-50">
              作品管理
            </a>
            {{-- カテゴリ管理を後で作るなら --}}
            {{-- <a href="#" class="block rounded-md px-3 py-2 text-sm hover:bg-slate-50">カテゴリ</a> --}}
          </nav>
        </div>
      </details>

      {{-- Brand --}}
      <div class="flex items-center gap-2 min-w-0">
        <a href="{{ route('portfolios.index') }}" class="font-semibold truncate">
          {{ config('app.name') }}
        </a>
        <span class="text-xs text-slate-500 hidden sm:inline">Admin</span>
      </div>

      {{-- Right --}}
      <div class="flex items-center gap-2">
        <div class="hidden sm:block text-sm text-slate-600">
          {{ Auth::user()->name ?? '' }}
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
                  class="inline-flex items-center gap-2 rounded-md border border-slate-200 bg-white px-3 py-2 text-sm hover:bg-slate-50">
            ログアウト
          </button>
        </form>
      </div>

    </div>
  </div>
</header>
