<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'marque'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category)
    {
        $this->category = $category;
    }


    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
                                    ->when($this->brandInputs, function($q) {
                                        $q->whereIn('marque', $this->brandInputs);
                                    }) 

                                    ->when($this->priceInput, function($q){

                                        $q->when($this->priceInput == 'high-to-low', function($q2) {
                                            $q2->orderBy('prix_de_vente', 'DESC');
                                            })

                                            ->when($this->priceInput == 'low-to-high', function($q2) {
                                                $q2->orderBy('prix_de_vente', 'ASC');

                                            });
                                         
                                    })
                                    ->where('status', '0')
                                    ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
