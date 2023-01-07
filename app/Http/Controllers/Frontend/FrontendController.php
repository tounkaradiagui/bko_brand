<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $Carousliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('Carousliders'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.categories.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if($category)
        {
            $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('products', 'category'));
        }
        else
        {
            return redirect()->back();
        }

    }
}
