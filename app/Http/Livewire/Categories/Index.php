<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $description;
    public $category_id;
    public $isEditing = false;
    public $products = [];   


    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable'
    ];

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $category = Category::find($this->category_id);
            $category->update([
                'name' => $this->name,
                'description' => $this->description
            ]);
            session()->flash('message', 'Catégorie mise à jour avec succès.');
        } else {
            Category::create([
                'name' => $this->name,
                'description' => $this->description
            ]);
            session()->flash('message', 'Catégorie créée avec succès.');
        }

        $this->reset(['name', 'description', 'isEditing', 'category_id']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Catégorie supprimée avec succès.');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.categories.index', [
            'categories' => $categories
        ])->layout('components.layouts.app');
    }
}