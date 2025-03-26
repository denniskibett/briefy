

<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-semibold mb-5">Edit Item</h2>

    <form action="<?php echo e(route('items.update', $item->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div>
            <label for="name">Item Name</label>
            <input type="text" name="name" id="name" value="<?php echo e($item->name); ?>" class="input" required>
        </div>
        <!-- Category Dropdown -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Category</label>
            <select name="category_id" id="category_id" class="w-full rounded-lg border border-gray-300 px-4 py-2 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                <option value="">Select a category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e($item->category_id == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" value="<?php echo e($item->unit); ?>" class="input">
        </div>
        
        <div>
            <label for="MOU">MOU</label>
            <input type="text" name="MOU" id="MOU" value="<?php echo e($item->MOU); ?>" class="input"> <!-- Corrected name attribute -->
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/items/edit.blade.php ENDPATH**/ ?>