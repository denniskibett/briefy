<?php $__env->startSection('content'); ?>
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Items' }">
        <?php echo $__env->make('partials.breadcrumb', ['pageName' => 'Add New Item'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            New Inventory Item
        </h3>

        <form action="<?php echo e(route('items.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                <!-- Item Name -->
                <div class="w-full">
                    <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                        Item Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        required
                        class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                    >
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Category -->
                <div class="w-full">
                    <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                        Category
                    </label>
                    <select 
                        name="category_id" 
                        id="category"
                        required
                        class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                    >
                        <option value="">Select category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Unit -->
                <div class="w-full">
                    <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                        Unit of Measurement
                    </label>
                    <select 
                        name="unit" 
                        id="unit"
                        required
                        class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                    >
                        <option value="Piece">Piece</option>
                        <option value="Kg">Kilogram (Kg)</option>
                        <option value="L">Litre (L)</option>
                        <option value="Meter">Meter (m)</option>
                        <option value="Box">Box</option>
                        <option value="Dozen">Dozen</option>
                    </select>
                    <?php $__errorArgs = ['unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- MOU -->
                <div class="w-full">
                    <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                        Measurement Unit (MOU)
                    </label>
                    <input 
                        type="text" 
                        name="MOU" 
                        id="MOU"
                        required
                        class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                    >
                    <?php $__errorArgs = ['MOU'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Price -->
                <div class="w-full">
                    <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                        Unit Price
                    </label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price"
                        step="0.01"
                        required
                        class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                    >
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- Submit Button -->
                <div class="mt-6">
                    
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                <button type="submit" 
                        class="h-11 w-full rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:bg-brand-500 dark:hover:bg-brand-600 dark:focus:ring-brand-700 sm:w-auto">
                        <a href="<?php echo e(route('items.index')); ?>" class="btn-secondary">
                            Cancel
                        </a>
                    </button>
                    <button type="submit" 
                        class="h-11 w-full rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:bg-brand-500 dark:hover:bg-brand-600 dark:focus:ring-brand-700 sm:w-auto">
                        Add Client
                    </button>
                </div>
            </div>

        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/items/create.blade.php ENDPATH**/ ?>