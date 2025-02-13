<x-app-layout>    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Créer un nouveau produit</h2>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nom -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Prix -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Prix</label>
                            <input type="number" step="0.01" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Quantité -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Quantité</label>
                            <input type="number" name="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Stock minimum -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock minimum</label>
                            <input type="number" name="minimum_stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('minimum_stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Fournisseur -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fournisseur</label>
                            <select name="supplier_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                            @error('supplier_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" class="mt-1 block w-full">
                            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer le produit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
