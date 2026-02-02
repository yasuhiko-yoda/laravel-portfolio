@if (session('status'))
  <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-900">
    {{ session('status') }}
  </div>
@endif

@if ($errors->any())
  <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-rose-900">
    <div class="font-semibold">入力内容を確認してください</div>
    <ul class="mt-2 list-disc pl-5 text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
