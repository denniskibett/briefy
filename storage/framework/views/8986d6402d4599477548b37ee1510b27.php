

<?php $__env->startSection('content'); ?>

<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Items` }">
        <?php echo $__env->make('partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Breadcrumb End -->

    <div class="container mx-auto">
        <?php
            // Table styling configuration
            $tableConfigJson = '{
                "container": "overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6",
                "headerWrapper": "flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between",
                "headerTitle": "text-lg font-semibold text-gray-800 dark:text-white/90",
                "headerButtons": "flex items-center gap-3",
                "button": "inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200",
                "tableWrapper": "w-full overflow-x-auto",
                "table": "min-w-full",
                "theadRow": "border-gray-100 border-y dark:border-gray-800",
                "th": "py-3",
                "thText": "font-medium text-gray-500 text-theme-xs dark:text-gray-400",
                "tbody": "divide-y divide-gray-100 dark:divide-gray-800"
            }';
            $tableConfig = json_decode($tableConfigJson, true);
        ?>

        <div class="<?php echo e($tableConfig['container']); ?>">
            <div class="<?php echo e($tableConfig['headerWrapper']); ?>">
                <div>
                    <h3 class="<?php echo e($tableConfig['headerTitle']); ?>">Item List (<?php echo e($totalItems); ?>)</h3>
                </div>
                <div class="<?php echo e($tableConfig['headerButtons']); ?>">
                    <a href="<?php echo e(route('items.create')); ?>">
                        <button class="<?php echo e($tableConfig['button']); ?>">
                            Add Item
                        </button>
                    </a>
                    <button class="<?php echo e($tableConfig['button']); ?>">
                        All Items
                    </button>
                </div>
            </div>

            <div class="<?php echo e($tableConfig['tableWrapper']); ?>">
                <table class="<?php echo e($tableConfig['table']); ?>">
                    <!-- Table Header Start -->
                    <thead>
                        <tr class="<?php echo e($tableConfig['theadRow']); ?>">
                            <th class="<?php echo e($tableConfig['th']); ?>">
                                <p class="<?php echo e($tableConfig['thText']); ?>">Item Name</p>
                            </th>
                            <th class="<?php echo e($tableConfig['th']); ?>">
                                <p class="<?php echo e($tableConfig['thText']); ?>">Category</p>
                            </th>
                            <th class="<?php echo e($tableConfig['th']); ?>">
                                <p class="<?php echo e($tableConfig['thText']); ?>">MOU</p>
                            </th>
                            <th class="<?php echo e($tableConfig['th']); ?>">
                                <p class="<?php echo e($tableConfig['thText']); ?>">Actions</p>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table Header End -->

                    <!-- Table Body Start -->
                    <tbody class="<?php echo e($tableConfig['tbody']); ?>">
                        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <!-- Name Column -->
                                <td class="py-3">
                                    <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                        <a href="<?php echo e(route('items.item', $item->id)); ?>" class="hover:underline">
                                            <?php echo e($item->name); ?>

                                        </a>
                                    </span>
                                </td>

                                <!-- Category Column -->
                                <td class="py-3 text-gray-700 text-theme-sm dark:text-gray-400">
                                    <?php echo e($item->category ? $item->category->name : 'N/A'); ?>

                                </td>

                                <!-- MOU/Unit Column -->
                                <td class="py-3 text-gray-700 text-theme-sm dark:text-gray-400">
                                    <?php echo e($item->MOU); ?> <?php echo e($item->unit); ?>

                                </td>

                                <!-- Actions Column -->
                                <td class="py-3">
                                    <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="text-green-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="py-3 text-center">No items available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <!-- Table Body End -->
                </table>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/items/items.blade.php ENDPATH**/ ?>