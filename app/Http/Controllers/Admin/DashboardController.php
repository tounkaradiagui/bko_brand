<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $brands = Brand::count();

        $totalAllUsers = User::count();
        $totalNormalUsers = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();

        $today = Carbon::now()->format('d-m-Y');
        $month = Carbon::now()->format('m');
        $years = Carbon::now()->format('Y');

        $orders = Order::count();
        $dailyOrder = Order::whereDate('created_at', $today)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $month)->count();
        $thisYearsOrder = Order::whereYear('created_at', $years)->count();

        return view('admin.dashboard', compact(
            'products',
            'categories',
            'brands',
            'totalAllUsers',
            'totalNormalUsers',
            'totalAdmin',
            'orders',
            'dailyOrder',
            'thisMonthOrder',
            'thisYearsOrder'
        ));
    }
}
