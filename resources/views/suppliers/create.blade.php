@extends('layouts.app')

@section('content')
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Add New Supplier' }">
        @include('partials.breadcrumb', ['pageName' => 'Add New Supplier'])
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            Create New Supplier
        </h3>

        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            
            <div class="mb-6 rounded-2xl border border-gray-200 p-5 dark:border-gray-800 lg:p-6">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                    <!-- Supplier Name -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Supplier Name
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            required
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contact Name -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Contact Name
                        </label>
                        <input 
                            type="text" 
                            name="contact_name" 
                            id="contact_name"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('contact_name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Phone Number
                        </label>
                        <input 
                            type="text" 
                            name="phone" 
                            id="phone"
                            required
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('phone')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            required
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Address
                        </label>
                        <input 
                            type="text" 
                            name="address" 
                            id="address"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('address')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Location
                        </label>
                        <input 
                            type="text" 
                            name="location" 
                            id="location"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('location')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Description
                        </label>
                        <input 
                            type="text" 
                            name="description" 
                            id="description"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('description')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
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
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tax PIN -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Tax PIN
                        </label>
                        <input 
                            type="text" 
                            name="tax_pin" 
                            id="tax_pin"
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                        @error('tax_pin')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('suppliers.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create Supplier
                </button>
            </div>
        </form>
    </div>
</main>
@endsection