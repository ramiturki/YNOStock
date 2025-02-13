<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'stock_value' => Product::sum(DB::raw('quantity * price')),
            'out_of_stock' => Product::where('quantity', '<=', 0)->count(),
            'latest_movements' => StockMovement::with(['product'])
                ->latest()
                ->take(5)
                ->get(),
            'active_alerts' => Alert::where('status', 'active')
                ->with(['product'])
                ->latest()
                ->take(5)
                ->get(),
        ];

        return view('dashboard', compact('stats'));
    }
}