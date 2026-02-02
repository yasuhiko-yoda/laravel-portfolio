<footer class="border-t border-slate-200 bg-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-sm text-slate-600">
      <div>© {{ date('Y') }} {{ config('app.name') }}</div>
      <div class="flex items-center gap-4">
        <a href="{{ route('works.index') }}" class="hover:text-slate-900">Works</a>
      </div>
    </div>
  </div>
</footer>
