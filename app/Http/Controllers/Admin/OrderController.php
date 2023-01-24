<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $commandes = Order::whereDate('created_at', $todayDate)->paginate(5);

        $todayDate = Carbon::now()->format('Y-m-d');
        $commandes = Order::when($request->date != null, function ($query) use($request){

                            return $query->whereDate('created_at', $request->date);

                            }, function($query) use($todayDate) {

                                return   $query->whereDate('created_at', $todayDate);
                            })
                            ->when($request->status != null, function ($query) use($request){

                                return $query->where('status_message', $request->status);

                            })
                            ->paginate(5);
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

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $orders = Order::where('id', $orderId)->first();
        if($orders){
            $orders->update([
                'status_message' => $request->order_status
            ]);

            return redirect('admin/orders/'.$orderId)->with('message', 'Le status de la commande a été modifié avec succès !');

        }else{

            return redirect('admin/orders/'.$orderId)->with('message', 'Aucune commande trouvée !');
        }
    }

    public function VoirInvoice(int $orderId)
    {
        $orders = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('orders'));
    }

    public function generateInvoice(int $orderId)
    {
        $orders = Order::findOrFail($orderId);
        $data = ['orders' => $orders];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);

        // $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('facture.pdf');
    }
}
