<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmont = 0;

    public $nom, $prenom, $email, $phone, $pincode, $adresse, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForm',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Payé par Paypal';

        $codOrder = $this->placeOrder();
        if($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();

            session()->flash('message','Votre commande a été passée avec succès');
            $this->dispatchBrowserEvent('message', [
                'text' => "Félicitation ! votre commande a été passée avec succès",
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');

        }else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => "Une erreur s'est produite, Veuillez réessayer",
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function validationForm()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:121',
            'prenom' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|min:8|max:12',
            'pincode' => 'required|string|min:4|max:6',
            'adresse' => 'required|string|max:500'
        ];
    }

    public function placeOrder()
    {
        $validatedData = $this->validate();
        $order= Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no'  => 'golden-'.Str::random(4).'-market',
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'adresse' => $this->adresse,
            'status_message' =>'Commande en cours',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach ($this->carts as $cartItem) {
            $orderItems = Order_Item::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id'  => $cartItem->product_color_id,
                'quantity'  => $cartItem->quantity,
                'price'  => $cartItem->product->prix_de_vente
            ]);


            if($cartItem->product_color_id != NULL) {
                $cartItem->productColor()->where('id',$cartItem->product_color_id )->decrement('quantity', $cartItem->quantity);
            }else {
                $cartItem->product()->where('id',$cartItem->product_id )->decrement('quantity', $cartItem->quantity);
            }
    
        }
        
        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Paiement à la livraison';
        $codOrder = $this->placeOrder();
        if($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();

            session()->flash('message','Votre commande a été passée avec succès');
            $this->dispatchBrowserEvent('message', [
                'text' => "Félicitation ! votre commande a été passée avec succès",
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');

        }else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => "Une erreur s'est produite, Veuillez réessayer",
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmont + 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmont += $cartItem->product->prix_de_vente * $cartItem->quantity;
        }

        return $this->totalProductAmont;
    }

    public function render()
    {
        $this->nom = auth()->user()->nom;
        $this->prenom = auth()->user()->prenom;
        $this->email = auth()->user()->email;

        $this->totalProductAmont = $this->totalProductAmount();

        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmont' => $this->totalProductAmont
        ]);
    }
}
