<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;

class Index extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $isEditing = false;

    public function render()
    {
        $suppliers = Supplier::all();
        return view('livewire.suppliers.index', [
            'suppliers' => $suppliers
        ])->layout('components.layouts.app');
    }
}