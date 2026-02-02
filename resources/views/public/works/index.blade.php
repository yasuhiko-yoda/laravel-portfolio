@extends('layouts.public.app')

{{-- @section('title', 'Works') --}}
@section('meta_title', 'Works - '.config('app.name'))
@section('meta_description', '制作実績の一覧ページです。カテゴリで絞り込んで閲覧できます。')
@section('og_type', 'website')
@section('og_url', route('works.index', request()->query()))
@section('og_image', asset('ogp.png'))

@section('content')
  <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12" data-gsap-fade>
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
      <div>
        <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">Works</h1>
        <p class="mt-2 text-slate-600 text-sm">制作物の一覧です。カテゴリで絞り込めます。</p>
      </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-2">
      <a href="{{ route('works.index') }}"
         class="rounded-full px-3 py-1.5 text-sm border {{ empty($categoryId) ? 'border-slate-900 bg-slate-900 text-white' : 'border-slate-200 hover:bg-slate-50 text-slate-700' }}">
        すべて
      </a>
      @foreach($categories as $c)
        <a href="{{ route('works.index', ['category' => $c->id]) }}"
           class="rounded-full px-3 py-1.5 text-sm border {{ (string)$categoryId === (string)$c->id ? 'border-slate-900 bg-slate-900 text-white' : 'border-slate-200 hover:bg-slate-50 text-slate-700' }}">
          {{ $c->name }}
        </a>
      @endforeach
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($portfolios as $p)
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

    <div class="mt-10">
      {{ $portfolios->links() }}
    </div>
  </section>
@endsection
