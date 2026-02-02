@extends('layouts.public.app')

@section('title', 'Home')

@section('content')
  <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center">
      <div>
        <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight">
          Portfolio
        </h1>
        <p class="mt-4 text-slate-600 leading-relaxed">
          Laravel 12 で作成した制作実績をまとめています。管理画面から追加・編集ができます。
        </p>

        <div class="mt-6 flex flex-col sm:flex-row gap-3">
          <a href="{{ route('works.index') }}"
             class="inline-flex h-11 items-center justify-center rounded-md bg-slate-900 px-5 text-sm font-medium text-white hover:bg-slate-800">
            Worksを見る
          </a>
          <a href="{{ route('works.index') }}#filter"
             class="inline-flex h-11 items-center justify-center rounded-md border border-slate-200 px-5 text-sm font-medium hover:bg-slate-50">
            カテゴリで探す
          </a>
        </div>
      </div>

      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
        <div class="text-sm font-medium text-slate-700">カテゴリ</div>
        <div class="mt-3 flex flex-wrap gap-2" id="filter">
          @foreach($categories as $c)
            <a href="{{ route('works.index', ['category' => $c->id]) }}"
               class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50">
              {{ $c->name }}
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16">
    <div class="flex items-end justify-between">
      <h2 class="text-lg font-semibold">Latest Works</h2>
      <a href="{{ route('works.index') }}" class="text-sm text-slate-600 hover:text-slate-900">一覧へ</a>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($latest as $p)
        <a href="{{ route('works.show', $p) }}"
           class="group rounded-2xl border border-slate-200 bg-white overflow-hidden hover:shadow-sm transition">
          <div class="aspect-[16/10] bg-slate-100">
            @if($p->thumbnail)
              <img src="{{ $p->thumbnail }}" alt="" class="h-full w-full object-cover">
            @endif
          </div>
          <div class="p-5">
            <div class="text-xs text-slate-500">{{ $p->category?->name }}</div>
            <div class="mt-1 font-semibold group-hover:underline underline-offset-2">
              {{ $p->title }}
            </div>
            <div class="mt-2 text-sm text-slate-600 line-clamp-2">
              {{ $p->description }}
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </section>
@endsection
