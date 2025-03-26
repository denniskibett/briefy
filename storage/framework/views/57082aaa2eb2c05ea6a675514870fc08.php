<?php $__env->startSection('content'); ?>
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Assign BOM to <?php echo e($supplier->name); ?>' }">
        <?php echo $__env->make('partials.breadcrumb', ['pageName' => 'Assign BOM'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            Assign BOM to Supplier: <?php echo e($supplier->name); ?>

        </h3>

        <form action="<?php echo e(route('bom_suppliers.store', $supplier)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="supplier_id" value="<?php echo e($supplier->id); ?>">

            <div class="mb-6 rounded-2xl border border-gray-200 p-5 dark:border-gray-800 lg:p-6">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-7 2xl:gap-x-32">
                    <!-- BOM Selection -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Select BOM
                        </label>
                        <select 
                            name="bom_id" 
                            id="bom_id"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                            <?php $__currentLoopData = $boms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($bom->id); ?>"><?php echo e($bom->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['bom_id'];
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

                    <!-- Unit Cost -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Unit Cost
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="unit_cost" 
                            id="unit_cost"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                            oninput="calculateTotal()"
                        >
                        <?php $__errorArgs = ['unit_cost'];
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

                    <!-- Quantity -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Quantity
                        </label>
                        <input 
                            type="number" 
                            name="quantity" 
                            id="quantity"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                            oninput="calculateTotal()"
                        >
                        <?php $__errorArgs = ['quantity'];
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
                </div>

                <!-- Hidden Total Cost -->
                <input type="hidden" name="total_cost" id="total_cost">
            </div>

            <!-- Form Actions -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="<?php echo e(route('suppliers.show', $supplier)); ?>" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Assign BOM
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    function calculateTotal() {
        let unitCost = parseFloat(document.getElementById('unit_cost').value) || 0;
        let quantity = parseInt(document.getElementById('quantity').value) || 0;
        document.getElementById('total_cost').value = (unitCost * quantity).toFixed(2);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/bom_suppliers/create.blade.php ENDPATH**/ ?>