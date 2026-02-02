<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Category;
use App\Models\Portfolio;

use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.portfolios.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        // Portfolio::create($request->validated());
        // return redirect()->route('portfolios.index')->with('status', '作品を登録しました');
        $data = $request->validated();

        // ファイルが来たら保存して thumbnail にパスを入れる
        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('thumbnails', 'public');
            $data['thumbnail'] = $path; // 例：thumbnails/xxx.webp
        }

        Portfolio::create($data);

        return redirect()->route('portfolios.index')->with('status', '作品を登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        $portfolio->load('category');
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        // $portfolio->update($request->validated());
        // return redirect()->route('portfolios.index')->with('status', '作品を更新しました');
        $data = $request->validated();

        if ($request->hasFile('thumbnail_file')) {
            // 古いファイル削除（thumbnailが保存パスの場合のみ）
            if ($portfolio->thumbnail && Storage::disk('public')->exists($portfolio->thumbnail)) {
                Storage::disk('public')->delete($portfolio->thumbnail);
            }

            $path = $request->file('thumbnail_file')->store('thumbnails', 'public');
            $data['thumbnail'] = $path;
        }

        $portfolio->update($data);

        return redirect()->route('portfolios.edit', $portfolio)->with('status', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('status', '作品を削除しました');
    }
}
