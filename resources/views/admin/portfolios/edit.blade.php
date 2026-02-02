@extends('layouts.admin.app')

@section('title', '作品編集')
@section('page_title', '作品編集')
@section('page_description', '登録済みの内容を更新します。')
@section('page_actions')
  <a href="{{ route('portfolios.show', $portfolio) }}"
     class="inline-flex items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">
    詳細を見る
  </a>
  <a href="{{ route('portfolios.index') }}"
     class="inline-flex items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">
    一覧へ戻る
  </a>
@endsection

@section('content')
  <form method="POST" action="{{ route('portfolios.update', $portfolio) }}" class="space-y-6" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.portfolios._form')
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
      <a href="{{ route('portfolios.index') }}"
         class="inline-flex h-10 items-center justify-center rounded-md border border-slate-200 bg-white px-4 text-sm font-medium hover:bg-slate-50">
        戻る
      </a>
      <button type="submit"
              class="inline-flex h-10 items-center justify-center rounded-md bg-slate-900 px-5 text-sm font-medium text-white hover:bg-slate-800">
        更新する
      </button>
    </div>
  </form>

  {{-- 削除カード --}}
  <div class="mt-10 rounded-xl border border-rose-200 bg-white p-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <div class="font-semibold text-rose-700">削除</div>
        <div class="mt-1 text-sm text-slate-600">
          この作品を削除します。削除すると元に戻せません。
        </div>
      </div>

      <form method="POST" action="{{ route('portfolios.destroy', $portfolio) }}"
            onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="inline-flex h-10 items-center justify-center rounded-md bg-rose-600 px-5 text-sm font-medium text-white hover:bg-rose-500">
          削除する
        </button>
      </form>
    </div>
  </div>
@endsection
