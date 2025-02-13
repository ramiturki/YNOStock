<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class Index extends Component
{
    use WithPagination;
    protected $layout = 'components.layouts.app';

    public $search = '';
    public $confirmingProductDeletion = false;
    public $productIdBeingDeleted;
    public $isEditing = false;
    public $categories = [];
    public $products = [];   
    protected $listeners = ['productAdded' => '$refresh', 'productUpdated' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirmingProductDeletion = true;
        $this->productIdBeingDeleted = $id;
    }

    public function deleteProduct()
    {
        Product::find($this->productIdBeingDeleted)?->delete();
        $this->confirmingProductDeletion = false;
        session()->flash('message', 'Produit supprimé avec succès.');
    }

    public function render()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('livewire.products.index', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }
}
