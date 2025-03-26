<?php $__env->startSection('content'); ?>
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Briefs' }">
        <?php echo $__env->make('partials.breadcrumb', ['pageName' => 'Add Items to Brief'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Add Items to Brief: <?php echo e($brief->name); ?></h3>
        </div>

        <form action="<?php echo e(route('briefs.items.store', ['brief' => $brief->id])); ?>" method="post" class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="item_id" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Select Item</label>
                    <select class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" name="item_id" id="item_id" required>
                        <option value="">Select an Item</option>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" data-price="<?php echo e($item->price); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div>
                    <label for="price" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Price</label>
                    <input type="text" name="price" id="price" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" required>
                </div>

                <div>
                    <label for="quantity" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" step="1" min="1" required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Save</button>
            </div>
        </form>

        <div class="mt-6">
            <table class="w-full border">
                <thead>
                    <tr>
                        <th class="p-2 border">Item Name</th>
                        <th class="p-2 border">Category</th>
                        <th class="p-2 border">Unit</th>
                        <th class="p-2 border">MOU</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="p-2 border"><?php echo e($item->name); ?></td>
                            <td class="p-2 border"><?php echo e($item->category); ?></td>
                            <td class="p-2 border"><?php echo e($item->unit); ?></td>
                            <td class="p-2 border"><?php echo e($item->MOU); ?></td>
                            <td class="p-2 border">
                                <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    document.getElementById('item_id').addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        let priceField = document.getElementById('price');
        priceField.value = selectedOption.getAttribute('data-price');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/briefs/items.blade.php ENDPATH**/ ?>