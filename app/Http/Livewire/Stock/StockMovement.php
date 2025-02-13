<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use App\Models\Product;
use App\Models\StockMovement as Movement;
use Livewire\WithPagination;

class StockMovement extends Component
{
    use WithPagination;

    public $type = 'entry';
    public $product_id;
    public $quantity;
    public $reason;
    public $showForm = false;

    protected $rules = [
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|numeric|min:1',
        'reason' => 'required|string|max:255',
        'type' => 'required|in:entry,exit'
    ];

    public function render()
    {
        return view('livewire.stock.movement', [
            'products' => Product::all(),
            'movements' => Movement::with('product')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function addMovement()
    {
        $this->validate();

        $product = Product::findOrFail($this->product_id);
        $quantity = $this->type === 'exit' ? -$this->quantity : $this->quantity;

        if ($this->type === 'exit' && ($product->stock_quantity + $quantity < 0)) {
            session()->flash('error', 'Stock insuffisant !');
            return;
        }

        Movement::create([
            'product_id' => $this->product_id,
            'quantity' => $quantity,
            'reason' => $this->reason,
            'type' => $this->type
        ]);

        $product->update([
            'stock_quantity' => $product->stock_quantity + $quantity
        ]);

        $this->checkStockAlert($product);

        $this->reset(['product_id', 'quantity', 'reason']);
        session()->flash('message', 'Mouvement de stock enregistré avec succès.');
    }

    private function checkStockAlert($product)
    {
        if ($product->stock_quantity <= $product->alert_threshold) {
            // Créer une alerte
            \App\Models\Alert::create([
                'product_id' => $product->id,
                'message' => "Le stock de {$product->name} est bas ({$product->stock_quantity} unités)",
                'status' => 'pending'
            ]);
        }
    }
}
