<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $commandes = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.orders.index', compact('commandes'));
    }

    public function show($orderId)
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        if($orders){
            return view('frontend.orders.view', compact('orders'));
        }else{
            return redirect()->back()->with('message', 'Aucune commande trouvée !');
        }
    }
}
