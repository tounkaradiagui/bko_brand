<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;

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

    public function addToCart(int $productId)
    {
        if(Auth::check()){
            // dd($productId);;
            if($this->product->where('id', $productId)->where('status', '0')->exists())
            {
                //checking for product color qty and add to cart
                if($this->product->productColors()->count() > 1)
                {
                   if($this->prodColorSelectedQuantity != NULL)
                   {
                    if(Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $productId)
                    ->where('product_color_id', $this->productColorId)
                    ->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => "Ce produit a déjà été ajouter à votre panier !",
                            'type' => 'warning',
                            'status' => 200
                        ]);

                    }else
                    {
                        $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if($productColor->quantity > 0)
                            {
                                if($productColor->quantity > $this->quantityCount) {
                                    //ajouter le produit au panier
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' =>$this->quantityCount
                                    ]);
                                    $this->emit('cartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => "Félicitation ! Le produit a été ajouté à votre Panier",
                                        'type' => 'success',
                                        'status' => 200
                                    ]);

                                }else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => "Il n'y a que".$productColor->quantity."quantitée disponible !",
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }else{
                                $this->dispatchBrowserEvent('message', [
                                    'text' => "Veuillez selectionner la couleur de produit  !",
                                    'type' => 'info',
                                    'status' => 404
                                ]);
                            }
                    }
                   }else
                   {
                        $this->dispatchBrowserEvent('message', [
                            'text' => "Veuillez selectionner la couleur de produit  !",
                            'type' => 'info',
                            'status' => 404
                        ]);
                   }
                }else
                {
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => "Ce produit a déjà été ajouté à votre Panier !",
                            'type' => 'warning',
                            'status' => 200
                        ]);

                    }else{

                        if($this->product->quantity > 0) {

                            if($this->product->quantity > $this->quantityCount) {
                                //ajouter le produit au panier
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => "Félicitation ! Le produit a été ajouté à votre Panier",
                                    'type' => 'success',
                                    'status' => 200
                                ]);

                            }else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => "Seulement .$this->quantityCount. quantitée disponible !",
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => "Ce produit est en rupture de stock !",
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }

            }else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => "Ce produit n'existe pas !",
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Veuillez vous conntectez pour ajouter ce produit à votre panier !',
                'type' => 'danger',
                'status' => 401
            ]);
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0)
        {
            $this->prodColorSelectedQuantity = 'enRuptureDeStock';
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
