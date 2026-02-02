@extends('layouts.public.app')

@section('title', $portfolio->title)

@section('content')
  <section class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between gap-3">
      <a href="{{ route('works.index') }}" class="text-sm text-slate-600 hover:text-slate-900">← 一覧へ</a>
      <div class="text-xs text-slate-500">{{ $portfolio->category?->name }}</div>
    </div>

    <h1 class="mt-4 text-2xl sm:text-3xl font-semibold tracking-tight">
      {{ $portfolio->title }}
    </h1>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-100 overflow-hidden">
      <div class="aspect-[16/10]">
        @if($portfolio->thumbnail)
          <img src="{{ $portfolio->thumbnail }}" alt="" class="h-full w-full object-cover">
        @endif
      </div>
    </div>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6">
      <div class="space-y-4 text-sm text-slate-700">
        @if($portfolio->url)
          <div>
            <div class="text-slate-500">URL</div>
            <a href="{{ $portfolio->url }}" target="_blank" rel="noopener"
               class="mt-1 inline-block font-medium text-slate-900 underline decoration-slate-300 hover:decoration-slate-500">
              {{ $portfolio->url }}
            </a>
          </div>
        @endif

        <div>
          <div class="text-slate-500">Description</div>
          <div class="mt-2 whitespace-pre-wrap leading-relaxed">
            {{ $portfolio->description ?: '—' }}
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8 flex items-center justify-between gap-3 text-sm">
      <div>
        @if($prev)
          <a href="{{ route('works.show', $prev) }}" class="text-slate-600 hover:text-slate-900">← 前へ</a>
        @endif
      </div>
      <div>
        @if($next)
          <a href="{{ route('works.show', $next) }}" class="text-slate-600 hover:text-slate-900">次へ →</a>
        @endif
      </div>
    </div>
  </section>
@endsection
