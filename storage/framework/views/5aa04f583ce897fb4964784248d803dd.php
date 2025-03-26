<?php $__env->startSection('content'); ?>
<div class="mx-auto max-w-screen-2xl p-4 md:p-6">
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Alerts`}">
        <?php echo $__env->make('partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Success Alert</h3>
            </div>
            <div class="border-t border-gray-100 p-4 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <?php echo $__env->make('partials.alert.alert-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Warning Alert</h3>
            </div>
            <div class="border-t border-gray-100 p-4 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <?php echo $__env->make('partials.alert.alert-warning', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Error Alert</h3>
            </div>
            <div class="border-t border-gray-100 p-4 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <?php echo $__env->make('partials.alert.alert-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Info Alert</h3>
            </div>
            <div class="border-t border-gray-100 p-4 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <?php echo $__env->make('partials.alert.alert-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/alerts.blade.php ENDPATH**/ ?>