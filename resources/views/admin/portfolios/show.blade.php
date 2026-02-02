@extends('layouts.admin.app')

@section('title', '作品詳細')
@section('page_title', $portfolio->title)
@section('page_description', '登録内容の確認ページです。')
@section('page_actions')
  <a href="{{ route('portfolios.edit', $portfolio) }}"
     class="inline-flex items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
    編集
  </a>
  <a href="{{ route('portfolios.index') }}"
     class="inline-flex items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">
    一覧へ戻る
  </a>
@endsection

@section('content')
  <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

    {{-- メイン --}}
    <div class="lg:col-span-2 space-y-6">
      <div class="rounded-xl border border-slate-200 bg-white p-6">
        <dl class="space-y-4 text-sm">
          <div>
            <dt class="text-slate-500">カテゴリ</dt>
            <dd class="mt-1 font-medium text-slate-900">{{ $portfolio->category?->name }}</dd>
          </div>

          <div>
            <dt class="text-slate-500">URL</dt>
            <dd class="mt-1">
              @if($portfolio->url)
                <a href="{{ $portfolio->url }}" target="_blank" rel="noopener"
                   class="font-medium text-slate-900 underline decoration-slate-300 hover:decoration-slate-500">
                  {{ $portfolio->url }}
                </a>
              @else
                <span class="text-slate-400">未設定</span>
              @endif
            </dd>
          </div>

          <div>
            <dt class="text-slate-500">サムネイル</dt>
            <dd class="mt-1">
              @if($portfolio->thumbnail)
                <div class="text-slate-700 break-all">{{ $portfolio->thumbnail }}</div>
              @else
                <span class="text-slate-400">未設定</span>
              @endif
            </dd>
          </div>

          <div>
            <dt class="text-slate-500">説明</dt>
            <dd class="mt-2 whitespace-pre-wrap text-slate-700">
              {{ $portfolio->description ?: '—' }}
            </dd>
          </div>
        </dl>
      </div>
    </div>

    {{-- サイド --}}
    <div class="space-y-6">
      <div class="rounded-xl border border-slate-200 bg-white p-6">
        <div class="text-sm">
          <div class="text-slate-500">ID</div>
          <div class="mt-1 font-semibold text-slate-900">{{ $portfolio->id }}</div>

          <div class="mt-4 text-slate-500">作成日</div>
          <div class="mt-1 font-medium text-slate-900">{{ $portfolio->created_at?->format('Y-m-d') }}</div>

          <div class="mt-4 text-slate-500">更新日</div>
          <div class="mt-1 font-medium text-slate-900">{{ $portfolio->updated_at?->format('Y-m-d') }}</div>
        </div>
      </div>

      <div class="rounded-xl border border-rose-200 bg-white p-6">
        <div class="font-semibold text-rose-700">削除</div>
        <p class="mt-2 text-sm text-slate-600">削除すると元に戻せません。</p>

        <form method="POST" action="{{ route('portfolios.destroy', $portfolio) }}"
              class="mt-4"
              onsubmit="return confirm('本当に削除しますか？');">
          @csrf
          @method('DELETE')
          <button type="submit"
                  class="inline-flex h-10 w-full items-center justify-center rounded-md bg-rose-600 px-5 text-sm font-medium text-white hover:bg-rose-500">
            削除する
          </button>
        </form>
      </div>
    </div>

  </div>
@endsection
