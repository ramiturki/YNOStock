<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $quantity, $supplier_id, $category_id, $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'supplier_id' => 'required|exists:suppliers,id',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ];

    public function store()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'supplier_id' => $this->supplier_id,
            'category_id' => $this->category_id,
            'image' => $imagePath,
        ]);

        // Réinitialiser les champs après l'ajout du produit
        $this->reset(['name', 'description', 'price', 'quantity', 'supplier_id', 'category_id', 'image']);

        session()->flash('message', 'Produit ajouté avec succès !');
    }

    public function render()
    {
        return view('livewire.products.create-blade', [
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
        ]);
    }
}

