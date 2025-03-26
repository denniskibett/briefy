<?php $__env->startSection('content'); ?>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6">
        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <!-- Left Side -->
            <div class="col-span-12 space-y-6 xl:col-span-7">
                <?php echo $__env->make('partials.metric-group.metric-group-01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('partials.chart.chart-01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- Right Side -->
            <div class="col-span-12 xl:col-span-5">
                <?php echo $__env->make('partials.chart.chart-02', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-span-12">
                <?php echo $__env->make('partials.chart.chart-03', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-span-12 xl:col-span-5">
                <?php echo $__env->make('partials.map-01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-span-12 xl:col-span-7">
                <?php echo $__env->make('partials.table.table-01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/dashboard.blade.php ENDPATH**/ ?>