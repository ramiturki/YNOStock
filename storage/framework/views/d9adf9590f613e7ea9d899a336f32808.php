<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <!-- Formulaire -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4">
                    <?php echo e($isEditing ? 'Modifier la catégorie' : 'Nouvelle catégorie'); ?>

                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea wire:model="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                    <button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <?php echo e($isEditing ? 'Mettre à jour' : 'Créer'); ?>

                    </button>
                </div>
            </div>

            <!-- Liste des catégories -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-4">Liste des catégories</h3>
                <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo e($category->name); ?></td>
                                <td class="px-6 py-4"><?php echo e($category->description); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button wire:click="edit(<?php echo e($category->id); ?>)" class="text-blue-600 hover:text-blue-900 mr-3">Modifier</button>
                                    <button wire:click="delete(<?php echo e($category->id); ?>)" class="text-red-600 hover:text-red-900">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/haghob/ynostock/resources/views/livewire/products/index.blade.php ENDPATH**/ ?>