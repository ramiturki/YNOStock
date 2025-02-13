<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Products\Index as ProductsIndex;
use App\Http\Livewire\Products\Create as ProductsCreate;
use App\Http\Livewire\Products\Edit as ProductsEdit;
use App\Http\Livewire\Categories\Index as CategoriesIndex;
use App\Http\Livewire\Suppliers\Index as SuppliersIndex;
use App\Http\Livewire\Stock\StockMovement;
use App\Http\Livewire\Stock\Alerts;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('livewire')->group(function () {
        Route::get('/products', ProductsIndex::class)->name('livewire.products.index');
        Route::get('/products/create', ProductsCreate::class)->name('livewire.products.create');
        Route::get('/products/{product}/edit', ProductsEdit::class)->name('livewire.products.edit');
        Route::get('/categories', CategoriesIndex::class)->name('livewire.categories.index');
        Route::get('/suppliers', SuppliersIndex::class)->name('livewire.suppliers.index');
        Route::get('/stock/movements', StockMovement::class)->name('livewire.stock.movements');
        Route::get('/stock/alerts', Alerts::class)->name('livewire.stock.alerts');
    });
    
    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stock-movements', StockMovementController::class);
    
});