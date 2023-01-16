<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1;

    public function addToWishlist($productId)
    {
       if (Auth::check()) 
       {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Produit déjà ajouté à vos listes de souhait !',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);  
                $this->emit('wishlistAddedUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Le produit ajouté à vos listes de souhait !',
                    'type' => 'success',
                    'status' => 200
                ]);

            }
       }
       else
       {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Veuillez vous conntectez pour continuer !',
                'type' => 'danger',
                'status' => 401
            ]);
            return false;
       }
    }

    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantite;

        if($this->productColorSelectedQuantity == 0)
        {
            $this->productColorSelectedQuantity = 'enRuptureDeStock';
        }
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){

            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){

            $this->quantityCount++;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'product' => $this->product,
            'category' => $this->category
        ]);
    }
}
