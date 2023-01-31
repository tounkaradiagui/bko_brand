<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMaillable;
use App\Models\Order;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $commandes = Order::whereDate('created_at', $todayDate)->paginate(5);

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($query) use($request){

                            return $query->whereDate('created_at', $request->date);

                            }, function($query) use($todayDate) {

                                return   $query->whereDate('created_at', $todayDate);
                            })
                            ->when($request->status != null, function ($query) use($request){

                                return $query->where('status_message', $request->status);

                            })
                            ->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){
            return view('admin.orders.view', compact('order'));
        }else{
            return redirect()->back()->with('message', 'Aucune commande trouvée !');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){
            $order->update([
                'status_message' => $request->order_status
            ]);

            return redirect('admin/orders/'.$orderId)->with('message', 'Le status de la commande a été modifié avec succès !');

        }else{

            return redirect('admin/orders/'.$orderId)->with('message', 'Aucune commande trouvée !');
        }
    }

    public function ViewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];

        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('Facture'.'#'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function sendMail(int $orderId)
    {

        try {
            $order = Order::findOrFail($orderId);
            
            Mail::to("$order->email")->send(new InvoiceOrderMaillable($order));
            return redirect('admin/orders/'.$orderId)->with('message','Félicitations !! La facture a été envoyée à '.$order->email);
        } catch(\Exception $e){

            return redirect('admin/orders/'.$orderId)->with('error',"Erreur d'envoi de mail, veuillez réessayer ");
        }

    }



}
