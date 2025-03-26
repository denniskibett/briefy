

<?php $__env->startSection('content'); ?>
    <main>
        <!-- Breadcrumb Start -->
        <div x-data="{ pageName: 'BOM Entry' }">
            <?php echo $__env->make('partials.breadcrumb', ['pageName' => 'BOM Entry'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Breadcrumb End -->

        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Edit BOM Entry</h3>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('bom.update', $bom->id)); ?>" method="POST" class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Item -->
                        <div>
                            <label for="item_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Item</label>
                            <select name="item_id" id="item_id" required class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e($bom->item_id == $item->id ? 'selected' : ''); ?>>
                                        <?php echo e($item->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Category</label>
                            <select name="category_id" id="category_id" required class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                <?php $__currentLoopData = $bomCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e($bom->category_id == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Material -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Material</label>
                            <input type="text" name="name" id="name" value="<?php echo e($bom->name); ?>" required class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Quantity -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Quantity</label>
                            <input type="number" name="quantity" id="quantity" value="<?php echo e($bom->quantity); ?>" required class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Unit Cost -->
                        <div>
                            <label for="unit_cost" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Unit Cost</label>
                            <input type="number" step="0.01" name="unit_cost" id="unit_cost" value="<?php echo e($bom->unit_cost); ?>" required class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Total Cost -->
                        <div>
                            <label for="total_cost" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Total Cost</label>
                            <input type="number" step="0.01" name="total_cost" id="total_cost" value="<?php echo e($bom->unit_cost * $bom->quantity); ?>" readonly class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>
                    </div>
                </div>

                <button type="submit" class="mt-5 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update BOM Entry</button>
            </form>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/bom/edit.blade.php ENDPATH**/ ?>