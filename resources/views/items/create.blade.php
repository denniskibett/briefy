@extends('layouts.app')

@section('content')
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Items' }">
        @include('partials.breadcrumb', ['pageName' => 'Add New Item'])
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            New Inventory Item
        </h3>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            
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
                    @error('name')
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
                    @error('unit')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
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
                    @error('MOU')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
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
                    @error('price')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Submit Button -->
                <div class="mt-6">
                    
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                <button type="submit" 
                        class="h-11 w-full rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:bg-brand-500 dark:hover:bg-brand-600 dark:focus:ring-brand-700 sm:w-auto">
                        <a href="{{ route('items.index') }}" class="btn-secondary">
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
@endsection