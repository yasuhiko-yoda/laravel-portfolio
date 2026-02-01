<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\PortfolioController;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //

    public function index (Request $request)
    {
        $portfolios = Portfolio::with('category')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }
}
