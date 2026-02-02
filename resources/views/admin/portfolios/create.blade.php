{{-- resources/views/admin/portfolios/create.blade.php --}}
<h1>作品追加</h1>

<form method="POST" action="{{ route('portfolios.store') }}">
  @include('admin.portfolios._form', ['portfolio' => new \App\Models\Portfolio()])
</form>

<a href="{{ route('portfolios.index') }}">戻る</a>
