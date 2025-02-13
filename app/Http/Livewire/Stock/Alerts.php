<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use App\Models\Alert;
use Livewire\WithPagination;

class Alerts extends Component
{
    use WithPagination;

    public function render()
    {
        $alerts = Alert::all();
        return view('livewire.stock.alerts', [
            'alerts' => $alerts
        ])->layout('components.layouts.app');
    }

    public function markAsResolved($alertId)
    {
        $alert = Alert::findOrFail($alertId);
        $alert->update(['status' => 'resolved']);
        session()->flash('message', 'Alerte marquée comme résolue.');
    }
}