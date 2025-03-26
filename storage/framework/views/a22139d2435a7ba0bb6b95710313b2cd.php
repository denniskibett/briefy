<?php $__env->startSection('content'); ?>

    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Profile' }">
        <?php echo $__env->make('partials.breadcrumb', ['pageName' => '<?php echo e($client->name); ?>'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <!-- Breadcrumb End -->

    <div class="container mx-auto mb-5 p-6 bg-white dark:bg-gray-900 rounded-lg shadow">
        
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
            Brief Details
        </h4>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
            <div>
                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                    Brief Name
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                    <?php echo e($brief->name); ?>

                </p>
            </div>

            <div>
                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                    Type
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                    <?php echo e($client->category->name ?? 'N/A'); ?>

                </p>
            </div>

            <div>
                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                    Budget
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                    KES <?php echo e(number_format($brief->budget, 2)); ?>

                </p>
            </div>

            <div>
                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                    Production Cost
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                    KES <?php echo e(number_format($brief->production_cost, 2)); ?>

                </p>
            </div>

            <div>
                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                    Profit & Loss
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                    KES <?php echo e(number_format($brief->budget - $brief->production_cost, 2)); ?>

                </p>
            </div>

            <div>
                <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                    Profit & Loss %
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                    <?php if($brief->budget > 0): ?>
                        <?php echo e(number_format(($brief->budget - $brief->production_cost) / $brief->budget * 100, 2)); ?>%
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </p>
            </div>
        </div>

    </div>


    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Brief Items
            </h3>
        </div>
        <div class="flex items-center gap-3">
            <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                <svg class="stroke-current fill-white dark:fill-gray-800" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z" fill="" stroke="" stroke-width="1.5"/>
                    <path d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z" fill="" stroke="" stroke-width="1.5"/>
                </svg>
                Filter
            </button>
            <a href="#">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                   Supplier LPO
                </button>
            </a>
            <a href="#">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    Invoice
                </button>
            </a>
            <a href="#">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    Delivery Note
                </button>
            </a>
            <a href="<?php echo e(route('brief.items', ['brief_id' => $brief->id])); ?>">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    Add Item
                </button>
            </a>
            <a href="<?php echo e(route('briefs.create')); ?>">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    Create Item
                </button>
            </a>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-gray-100 border-y dark:border-gray-800">
                    <th class="py-3">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Item</p>
                    </th>
                    <th class="py-3">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Category</p>
                    </th>
                    <th class="py-3">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Quantity</p>
                    </th>
                    <th class="py-3">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Price</p>
                    </th>
                    <th class="py-3">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Total</p>
                    </th>
                    <th class="py-3">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Actions</p>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                <?php
                    $totalQuantity = 0;
                    $totalPrice = 0;
                    $grandTotal = 0;
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $brief->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $price = $item->pivot->price ?? 0;
                        $quantity = $item->pivot->quantity ?? 0;
                        $total = $price * $quantity;
                        $totalQuantity += $quantity;
                        $totalPrice += $price;
                        $grandTotal += $total;
                    ?>
                    <tr>
                        <td class="py-3">
                            <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                <a href="<?php echo e(route('items.show', ['client_id' => $client->id, 'brief_id' => $brief->id, 'item_id' => $item->id])); ?>" class="text-blue-600 hover:underline">
                                    <?php echo e($item->name); ?>

                                </a>
                            </span>
                            <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
                                <?php echo e($item->category->name ?? 'N/A'); ?>

                            </span>
                        </td>
                        <td class="py-3">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400"><?php echo e($item->category->name ?? 'N/A'); ?></p>
                        </td>
                        <td class="py-3">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400"><?php echo e($quantity); ?> <?php echo e($item->unit); ?>s</p>
                        </td>
                        <td class="py-3">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">KES <?php echo e(number_format($price, 2)); ?></p>
                        </td>
                        <td class="py-3">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">KES <?php echo e(number_format($total, 2)); ?></p>
                        </td>
                        <td class="py-3">
                            <a href="<?php echo e(route('briefs.edit', $item->id)); ?>" class="text-green-600 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <form action="<?php echo e(route('briefs.destroy', $item->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="6" class="py-4 px-6 text-center">No items available for this brief.</td>
                    </tr>
                <?php endif; ?>
                <tfoot>
                <tr class="bg-gray-100">
                    <td colspan="3" class="py-2 px-4 border-b font-bold text-right">Totals:</td>
                    <td class="py-2 px-4 border-b font-bold"></td>
                    <td class="py-2 px-4 border-b font-bold">KES <?php echo e(number_format($grandTotal, 2)); ?></td>
                    <td class="py-2 px-4 border-b font-bold"><?php echo e(number_format($totalQuantity)); ?> items</td>
                </tr>
            </tfoot>
            </tbody>
            
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/briefs/brief.blade.php ENDPATH**/ ?>