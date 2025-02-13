<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- En-tête avec bouton de création -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Liste des produits</h3>
                    <a href="<?php echo e(route('products.create')); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Nouveau produit
                    </a>
                </div>

                <!-- Message de succès -->
                <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Table des produits -->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo e($product->name); ?></td>
                                <td class="px-6 py-4"><?php echo e($product->description); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button wire:click="edit(<?php echo e($product->id); ?>)" class="text-blue-600 hover:text-blue-900 mr-3">Modifier</button>
                                    <button wire:click="delete(<?php echo e($product->id); ?>)" class="text-red-600 hover:text-red-900">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/haghob/ynostock/resources/views/livewire/categories/index.blade.php ENDPATH**/ ?>