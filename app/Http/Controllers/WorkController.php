<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class WorkController extends Controller
{
     public function home()
    {
        $latest = Portfolio::with('category')
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('public.home', compact('latest', 'categories'));
    }

    public function index(Request $request)
    {
        $categoryId = $request->query('category');

        $query = Portfolio::with('category')->latest();

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $portfolios = $query->paginate(12)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('public.works.index', compact('portfolios', 'categories', 'categoryId'));
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('category');

        // 前後ナビ（同カテゴリ縛りにしたい場合は where('category_id', $portfolio->category_id) を追加）
        $prev = Portfolio::where('id', '<', $portfolio->id)
            ->orderByDesc('id')
            ->first();

        $next = Portfolio::where('id', '>', $portfolio->id)
            ->orderBy('id')
            ->first();

        return view('public.works.show', compact('portfolio', 'prev', 'next'));
    }
}
