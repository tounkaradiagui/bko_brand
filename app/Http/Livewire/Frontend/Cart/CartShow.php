<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{
    public $cart, $totalprice = 0;

    public function removeCartItem(int $cartId)
    {
        $removeCart = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($removeCart) {
            $removeCart->delete();
            $this->emit('cartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => "Félicitation ! Le produit a été supprimé à votre Panier",
                'type' => 'success',
                'status' => 200
            ]);
        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => "Erreur de suppression, Veuillez réessayer",
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if($productColor->quantite > $cartData->quantity)
                {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantité modifiée avec succès !',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => "Il n'y a que" .$productColor->quantite. "Quantité disponible!",
                        'type' => 'success',
                        'status' => 200
                    ]);
                }

            }else {
                if ($cartData->product->quantity > $cartData->quantity) 
                {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantité modifiée avec succès !',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => "Il n'y a que" .$cartData->product->quantity. "Quantité disponible!",
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }

        }else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Erreur de modification, Veuillez réessayer!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if($productColor->quantite > $cartData->quantity)
                {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantité modifiée avec succès !',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => "Il n'y a que" .$productColor->quantite. "Quantité disponible!",
                        'type' => 'success',
                        'status' => 200
                    ]);
                }

            }else {
                if ($cartData->product->quantity > $cartData->quantity) 
                {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantité modifiée avec succès !',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => "Il n'y a que" .$cartData->product->quantity. "Quantité disponible!",
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }

        }else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Erreur de modification, Veuillez réessayer!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
