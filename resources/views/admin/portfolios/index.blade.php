{{-- resources/views/admin/portfolios/index.blade.php --}}
@extends('layouts.admin.app')

{{-- @section('title', '作品管理') --}}
@section('page_title', '作品一覧')
@section('meta_title', 'Works - '.config('app.name'))
@section('meta_description', '制作実績の一覧ページです。カテゴリで絞り込んで閲覧できます。')
@section('og_type', 'website')
@section('og_url', route('works.index', request()->query()))
@section('og_image', asset('ogp.png'))

@section('page_actions')
  <a href="{{ route('portfolios.create') }}"
     class="inline-flex items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
    新規追加
  </a>
@endsection

@if (session('status'))
  <div>{{ session('status') }}</div>
@endif

@section('content')
  {{-- ここに一覧テーブル --}}
  {{-- <p><a href="{{ route('portfolios.create') }}">＋ 新規追加</a></p> --}}

<div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
  <table class="min-w-[900px] w-full divide-y divide-slate-200 text-sm">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-3 text-left font-medium text-slate-600">タイトル</th>
        <th class="px-4 py-3 text-left font-medium text-slate-600">カテゴリ</th>
        <th class="px-4 py-3 text-left font-medium text-slate-600">更新日</th>
        <th class="px-4 py-3 text-right font-medium text-slate-600">操作</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
      @foreach($portfolios as $p)
        <tr class="hover:bg-slate-50">
          <td class="px-4 py-3 text-left font-medium text-slate-600 w-[40%]" whitespace-nowrap>
            <a href="{{ route('portfolios.show', $p) }}" class="hover:underline">
              {{ $p->title }}
            </a>
          </td>
          <td class="px-4 py-3 text-left font-medium text-slate-600 w-[20%] whitespace-nowrap">{{ $p->category?->name }}</td>
          <td class="px-4 py-3 text-left font-medium text-slate-600 w-[20%] whitespace-nowrap">
            {{ $p->updated_at->format('Y-m-d') }}
          </td>
          <td class="px-4 py-3 text-right font-medium text-slate-600 w-[20%] whitespace-nowrap">
            <div class="inline-flex items-center gap-2">
              <a href="{{ route('portfolios.edit', $p) }}"
                 class="rounded-md border border-slate-200 px-3 py-1.5 hover:bg-slate-50">
                編集
              </a>
              <form method="POST" action="{{ route('portfolios.destroy', $p) }}"
                    onsubmit="return confirm('削除しますか？');">
                @csrf
                @method('DELETE')
                <button class="rounded-md border border-rose-200 px-3 py-1.5 text-rose-600 hover:bg-rose-50">
                  削除
                </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="mt-6">
  {{ $portfolios->links() }}
</div>

@endsection
