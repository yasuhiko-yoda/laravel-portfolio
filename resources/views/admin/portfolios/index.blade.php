{{-- resources/views/admin/portfolios/index.blade.php --}}
@extends('layouts.admin.layouts')

<h1 class="text-[50px] text-red-500 font-bold">作品一覧（管理）</h1>

@if (session('status'))
  <div>{{ session('status') }}</div>
@endif

<p><a href="{{ route('portfolios.create') }}">＋ 新規追加</a></p>

<table border="1" cellpadding="6">
  <thead>
    <tr>
      <th>ID</th>
      <th>タイトル</th>
      <th>カテゴリ</th>
      <th>更新日</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($portfolios as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td><a href="{{ route('portfolios.show', $p) }}">{{ $p->title }}</a></td>
        <td>{{ $p->category?->name }}</td>
        <td>{{ $p->updated_at }}</td>
        <td>
          <a href="{{ route('portfolios.edit', $p) }}">編集</a>

          <form method="POST" action="{{ route('portfolios.destroy', $p) }}" style="display:inline"
                onsubmit="return confirm('削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $portfolios->links() }}
