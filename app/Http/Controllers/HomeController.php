<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Slider;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $setting = Setting::first();
        $trendingProducts = Product::where('tendance', '1')->latest()->take('15')->get();
        $news = Product::where('tendance', '1')->latest()->take('15')->get();
        $featured = Product::where('featured', '1')->latest()->take('15')->get();
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders', 'setting', 'trendingProducts', 'news', 'featured'));
    }
}
