{{-- resources/views/admin/portfolios/edit.blade.php --}}
<h1>作品編集</h1>

<form method="POST" action="{{ route('portfolios.update', $portfolio) }}">
  @method('PUT')
  @include('admin.portfolios._form')
</form>

<a href="{{ route('portfolios.index') }}">戻る</a>
