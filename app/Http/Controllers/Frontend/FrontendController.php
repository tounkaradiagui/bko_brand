<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Mail\EmailVerificationMailable;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $trendingProducts = Product::where('tendance', '1')->latest()->take('15')->get();
        $news = Product::where('tendance', '1')->latest()->take('15')->get();
        $featured = Product::where('featured', '1')->latest()->take('15')->get();
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders', 'trendingProducts', 'news', 'featured'));
    }

    public function chatIndex()
    {
        return view('frontend.index');
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
            return view('frontend.collections.products.index', compact('category'));
        }
        else
        {
            return redirect()->back();
        }

    }

    public function productView(string $category_slug, string $product_slug )
    {
        $category = Category::where('slug', $category_slug)->first();

        if($category)
        {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if($product)
            {
                return view('frontend.collections.products.view', compact('category', 'product'));
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function newArrivals()
    {
        $news = Product::where('tendance', '1')->latest()->take('30')->get();
        return view('frontend.pages.new-arrival', compact('news'));
    }

    public function featuredProducts()
    {
        $featured = Product::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured-product', compact('featured'));
    }


    public function ClientSideSearchProduct(Request $request)
    {
        if ($request->rechercher) {
            $searchProducts = Product::where('nom', 'LIKE', '%'.$request->rechercher.'%')
                            ->latest()->paginate('25');
            return view('frontend.pages.rechercherProduits', compact('searchProducts'));
        }else {
            return redirect()->back()->with('message', 'Aucun résultat pour votre recherche');
        }
    }

    public function viewEmailVerification()
    {
        return view('admin.email.verification');
    }

}
