@extends('layouts.admin.app')

@section('title', '作品追加')
@section('page_title', '作品追加')
@section('page_description', '新しい制作物を登録します。')
@section('page_actions')
  <a href="{{ route('portfolios.index') }}"
     class="inline-flex items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">
    一覧へ戻る
  </a>
@endsection

@section('content')
  <form method="POST" action="{{ route('portfolios.store') }}" class="space-y-6">
    @include('admin.portfolios._form', ['portfolio' => new \App\Models\Portfolio()])
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
      <a href="{{ route('portfolios.index') }}"
         class="inline-flex h-10 items-center justify-center rounded-md border border-slate-200 bg-white px-4 text-sm font-medium hover:bg-slate-50">
        キャンセル
      </a>
      <button type="submit"
              class="inline-flex h-10 items-center justify-center rounded-md bg-slate-900 px-5 text-sm font-medium text-white hover:bg-slate-800">
        保存する
      </button>
    </div>
  </form>
@endsection
