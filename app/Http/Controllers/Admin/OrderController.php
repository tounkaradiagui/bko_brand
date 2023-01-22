<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $todayDate = Carbon::now();
        $commandes = Order::whereDate('created_at', $todayDate)->paginate(5);
        return view('admin.orders.index', compact('commandes'));
    }

    public function show(int $orderId)
    {
        $orders = Order::where('id', $orderId)->first();
        if($orders){
            return view('admin.orders.view', compact('orders'));
        }else{
            return redirect()->back()->with('message', 'Aucune commande trouvée !');
        }
    }
}
