<?php $__env->startSection('content'); ?>
<div class="flex h-screen overflow-hidden bg-gray-100 dark:bg-gray-900">


    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="p-4 bg-white dark:bg-gray-800 shadow-lg flex justify-between items-center">
            <h1 class="text-3xl font-bold">Brief Manager</h1>
            <div class="flex items-center">
                <span class="text-gray-600"><?php echo e(__("You're logged in!")); ?></span>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="ml-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                </form>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6 max-w-screen-2xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-bold">Total Clients</h3>
                    <p class="text-2xl">#</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-bold">Total Briefs</h3>
                    <p class="text-2xl">#</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-bold">Total Items</h3>
                    <p class="text-2xl">#</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-bold">Total BOMs</h3>
                    <p class="text-2xl">#</p>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/dash.blade.php ENDPATH**/ ?>