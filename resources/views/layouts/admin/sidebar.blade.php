<aside class="h-screen sticky top-0 border-r border-slate-200 bg-white">
  <div class="h-14 px-4 flex items-center border-b border-slate-200">
    <div class="font-semibold truncate">{{ config('app.name') }}</div>
  </div>

  <nav class="p-3 space-y-1">
    <a href="{{ route('portfolios.index') }}"
       class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium
              {{ request()->routeIs('portfolios.*') ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-slate-50' }}">
      作品管理
    </a>

    {{-- 後でカテゴリCRUD作るなら --}}
    {{-- <a href="{{ route('categories.index') }}" class="...">カテゴリ</a> --}}
  </nav>

  <div class="p-3 mt-auto">
    <div class="rounded-lg bg-slate-50 p-3 text-xs text-slate-600">
      <div class="font-medium text-slate-800">Tips</div>
      <div class="mt-1">スマホでは左上のメニューから操作できます。</div>
    </div>
  </div>
</aside>
