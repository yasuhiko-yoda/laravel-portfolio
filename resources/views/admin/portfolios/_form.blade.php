{{-- @csrf

<div>
  <label>タイトル</label>
  <input name="title" value="{{ old('title', $portfolio->title ?? '') }}">
  @error('title')<div>{{ $message }}</div>@enderror
</div>

<div>
  <label>URL</label>
  <input name="url" value="{{ old('url', $portfolio->url ?? '') }}">
  @error('url')<div>{{ $message }}</div>@enderror
</div>

<div>
  <label>サムネイル（URL or パス）</label>
  <input name="thumbnail" value="{{ old('thumbnail', $portfolio->thumbnail ?? '') }}">
  @error('thumbnail')<div>{{ $message }}</div>@enderror
</div>

<div>
  <label>カテゴリ</label>
  <select name="category_id">
    @foreach($categories as $category)
      <option value="{{ $category->id }}"
        @selected(old('category_id', $portfolio->category_id ?? '') == $category->id)>
        {{ $category->name }}
      </option>
    @endforeach
  </select>
  @error('category_id')<div>{{ $message }}</div>@enderror
</div>

<div>
  <label>説明</label>
  <textarea name="description">{{ old('description', $portfolio->description ?? '') }}</textarea>
  @error('description')<div>{{ $message }}</div>@enderror
</div>

<button type="submit">保存</button> --}}

@csrf

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
  {{-- 左：入力フォーム --}}
  <div class="lg:col-span-2 space-y-6">
    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <div class="space-y-5">

        {{-- タイトル --}}
        <div>
          <label class="block text-sm font-medium text-slate-700">タイトル <span class="text-rose-600">*</span></label>
          <input
            name="title"
            value="{{ old('title', $portfolio->title ?? '') }}"
            class="mt-2 block w-full rounded-md border-slate-300 focus:border-slate-900 focus:ring-slate-900"
            placeholder="例：コーポレートサイト（〇〇株式会社）"
            required
          >
          @error('title')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        {{-- URL --}}
        <div>
          <label class="block text-sm font-medium text-slate-700">URL</label>
          <input
            name="url"
            value="{{ old('url', $portfolio->url ?? '') }}"
            class="mt-2 block w-full rounded-md border-slate-300 focus:border-slate-900 focus:ring-slate-900"
            placeholder="https://example.com"
          >
          @error('url')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        {{-- サムネイル（まずは文字列：URL or storageパス） --}}
        <div>
          <label class="block text-sm font-medium text-slate-700">サムネイル（URL / パス）</label>
          <input
            name="thumbnail"
            value="{{ old('thumbnail', $portfolio->thumbnail ?? '') }}"
            class="mt-2 block w-full rounded-md border-slate-300 focus:border-slate-900 focus:ring-slate-900"
            placeholder="例：https://... / storage/thumbnails/..."
          >
          @error('thumbnail')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
          <p class="mt-2 text-xs text-slate-500">
            画像アップロード対応は後で追加できます（今はURL/パスでもOK）。
          </p>
        </div>

        {{-- 説明 --}}
        <div>
          <label class="block text-sm font-medium text-slate-700">説明</label>
          <textarea
            name="description"
            rows="6"
            class="mt-2 block w-full rounded-md border-slate-300 focus:border-slate-900 focus:ring-slate-900"
            placeholder="制作概要、担当範囲、使用技術、工夫した点など"
          >{{ old('description', $portfolio->description ?? '') }}</textarea>
          @error('description')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

      </div>
    </div>
  </div>

  {{-- 右：補助情報 --}}
  <div class="space-y-6">
    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <div class="space-y-5">

        {{-- カテゴリ --}}
        <div>
          <label class="block text-sm font-medium text-slate-700">カテゴリ <span class="text-rose-600">*</span></label>
          <select
            name="category_id"
            class="mt-2 block w-full rounded-md border-slate-300 focus:border-slate-900 focus:ring-slate-900"
            required
          >
            @foreach($categories as $category)
              <option value="{{ $category->id }}"
                @selected(old('category_id', $portfolio->category_id ?? null) == $category->id)>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        {{-- メタ情報（編集時だけ表示） --}}
        @if(!empty($portfolio?->id))
          <div class="rounded-lg bg-slate-50 p-4 text-sm text-slate-700">
            <div class="flex items-center justify-between">
              <span class="text-slate-500">ID</span>
              <span class="font-medium">{{ $portfolio->id }}</span>
            </div>
            <div class="mt-2 flex items-center justify-between">
              <span class="text-slate-500">更新日</span>
              <span class="font-medium">{{ $portfolio->updated_at?->format('Y-m-d') }}</span>
            </div>
          </div>
        @endif

      </div>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <div class="text-sm text-slate-700">
        <div class="font-semibold text-slate-900">入力のコツ</div>
        <ul class="mt-3 list-disc pl-5 space-y-1 text-slate-600">
          <li>説明は「担当範囲」「使用技術」「工夫」を入れると強い</li>
          <li>URLが無い作品は空でもOK</li>
          <li>カテゴリは後で追加できます</li>
        </ul>
      </div>
    </div>

  </div>
</div>
