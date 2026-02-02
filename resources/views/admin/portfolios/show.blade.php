{{-- resources/views/admin/portfolios/show.blade.php --}}
<h1>{{ $portfolio->title }}</h1>

<p>カテゴリ：{{ $portfolio->category?->name }}</p>
@if($portfolio->url)
  <p>URL：<a href="{{ $portfolio->url }}" target="_blank" rel="noopener">開く</a></p>
@endif
@if($portfolio->thumbnail)
  <p>サムネイル：{{ $portfolio->thumbnail }}</p>
@endif
<p>{!! nl2br(e($portfolio->description)) !!}</p>

<p>
  <a href="{{ route('portfolios.edit', $portfolio) }}">編集</a>
  <a href="{{ route('portfolios.index') }}">一覧へ</a>
</p>
