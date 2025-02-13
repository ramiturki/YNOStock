<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render()
    {
        $lowStockProducts = Product::where('stock_quantity', '<=', DB::raw('min_threshold'))
            ->get();

        $recentMovements = StockMovement::with('product')
            ->latest()
            ->take(5)
            ->get();

        $pendingAlerts = Alert::where('status', 'pending')
            ->count();

        $stockStats = [
            'total_products' => Product::count(),
            'low_stock_count' => $lowStockProducts->count(),
            'total_value' => Product::sum(DB::raw('stock_quantity * price')),
            'pending_alerts' => $pendingAlerts
        ];

        return view('livewire.dashboard', [
            'lowStockProducts' => $lowStockProducts,
            'recentMovements' => $recentMovements,
            'stockStats' => $stockStats
        ]);
    }
}