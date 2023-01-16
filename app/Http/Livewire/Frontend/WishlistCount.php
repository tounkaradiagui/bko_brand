<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if(Auth::check()) {
            return $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
       }
       else
       {
           return $this->wishlistCount = 0;
       }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.frontend.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
