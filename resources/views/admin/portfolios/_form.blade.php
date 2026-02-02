@csrf

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

<button type="submit">保存</button>
