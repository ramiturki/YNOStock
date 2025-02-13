<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tableau de bord') }}
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('livewire.categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Catégories
                </a>
                <a href="{{ route('livewire.suppliers.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Fournisseurs
                </a>
                <a href="{{ route('livewire.products.index') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                    Produits
                </a>
                <a href="{{ route('livewire.stock.movements') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                    Mouvements de Stock
                </a>
                <a href="{{ route('livewire.stock.alerts') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Alertes
                </a>
            </div>
        </div>
    </x-slot>

    <!-- Rest of your dashboard content -->
    <!-- ... -->
</x-app-layout>