<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity;

    public function addToWishlist($productId)
    {
       if (Auth::check()) 
       {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
            {
                session()->flash('message', 'Produit déjà ajouté à vos listes de souhait !');
                return false;
            }
            else
            {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);  
                
                session()->flash('message', 'Le produit ajouté à vos listes de souhait !');

            }
       }
       else
       {
            session()->flash('message', 'Veuillez vous conntectez pour continuer !');
       }
    }

    public function colorSelectedd($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantite;

        if($this->productColorSelectedQuantity == 0)
        {
            $this->productColorSelectedQuantity = 'enRuptureDeStock';
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
