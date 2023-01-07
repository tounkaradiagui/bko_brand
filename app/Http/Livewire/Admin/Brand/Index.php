<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nom, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'nom' =>'required|string',
            'slug'=>'required|string',
            'status' =>'nullable'
        ];
    }

    public function resetInput()
    {
        $this->nom = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }

    public function enregistMarque()
    {
        $validatedData = $this->validate();
        Brand::create([
            'nom' => $this->nom,
            'slug' =>Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);

        session()->flash('message', 'La marque a été ajouté avec succès');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }
    public function openModal()
    {
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->nom = $brand->nom;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function updateBrand()
    {
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'nom' => $this->nom,
            'slug' =>Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);

        session()->flash('message', 'La marque a été modifiée avec succès');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'La marque a été supprimée avec succès');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands])
                    ->extends('layouts.admin')
                    ->section('content');

    }
}
