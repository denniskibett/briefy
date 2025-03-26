<?php $__env->startSection('content'); ?>
<div class="mx-auto max-w-screen-2xl p-4 md:p-6">
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Buttons`}">
        <?php echo $__env->make('partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <!-- Primary Button -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Primary Button
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                <?php echo $__env->make('partials.buttons.button-01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <!-- Primary Button with Left Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Primary Button with Left Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                <?php echo $__env->make('partials.buttons.button-02', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <!-- Primary Button with Right Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Primary Button with Right Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                <?php echo $__env->make('partials.buttons.button-03', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <!-- Secondary Button -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Secondary Button
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                <?php echo $__env->make('partials.buttons.button-04', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <!-- Secondary Button with Left Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Secondary Button with Left Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                <?php echo $__env->make('partials.buttons.button-05', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <!-- Secondary Button with Right Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Secondary Button with Right Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                <?php echo $__env->make('partials.buttons.button-06', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/buttons.blade.php ENDPATH**/ ?>