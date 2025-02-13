<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class Edit extends Component
{
    
    
    public $productId, $name, $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ];

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
    }

    public function update()
    {
        $this->validate();

        Product::find($this->productId)->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Produit mis à jour avec succès.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}
