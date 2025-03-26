<?php $__env->startSection('content'); ?>
    <main>
        <!-- Breadcrumb Start -->
        <div x-data="{ pageName: 'Client' }">
            <?php echo $__env->make('partials.breadcrumb', ['pageName' => 'Client'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Breadcrumb End -->

        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Add New Client</h3>
            </div>

            <form action="<?php echo e(route('clients.store')); ?>" method="POST" class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Client Name -->
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Client Name
                            </label>
                            <input type="text" name="name" id="name" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Contact Name -->
                        <div>
                            <label for="contact_name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Contact Name
                            </label>
                            <input type="text" name="contact_name" id="contact_name" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Address
                            </label>
                            <input type="text" name="address" id="address" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Location
                            </label>
                            <input type="text" name="location" id="location" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <!-- Status -->
                        <div x-data="{ status: 0 }">
                            <label for="status" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                            <input type="hidden" name="status" :value="status">
                            
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" id="status" class="sr-only" @change="status = status === 1 ? 0 : 1">
                                    <div class="block w-14 h-8 rounded-full transition duration-300" :class="status === 1 ? 'bg-blue-500' : 'bg-gray-300'"></div>
                                    <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md transform transition duration-300" :class="status === 1 ? 'translate-x-6' : 'translate-x-0'"></div>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">
                                    <span x-text="status === 1 ? 'Active' : 'Inactive'"></span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Phone Number
                            </label>
                            <input type="text" name="phone" id="phone" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Email
                            </label>
                            <input type="email" name="email" id="email" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Industry Category -->
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Industry Category
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select 
                                    name="category_id" 
                                    id="category_id" 
                                    required
                                    class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true"
                                >
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        Select a category
                                    </option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option 
                                            value="<?php echo e($category->id); ?>" 
                                            class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                        >
                                            <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="pointer-events-none absolute right-4 top-1/2 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </div>


                        <!-- Tax PIN -->
                        <div>
                            <label for="tax_pin" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Tax PIN
                            </label>
                            <input type="text" name="tax_pin" id="tax_pin" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" 
                        class="h-11 w-full rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:bg-brand-500 dark:hover:bg-brand-600 dark:focus:ring-brand-700 sm:w-auto">
                        Add Client
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\briefy\resources\views/clients/create.blade.php ENDPATH**/ ?>