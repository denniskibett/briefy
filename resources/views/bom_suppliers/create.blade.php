@extends('layouts.app')

@section('content')
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Assign BOM to {{ $supplier->name }}' }">
        @include('partials.breadcrumb', ['pageName' => 'Assign BOM'])
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            Assign BOM to Supplier: {{ $supplier->name }}
        </h3>

        <form action="{{ route('bom_suppliers.store', $supplier) }}" method="POST">
            @csrf
            <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">

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
                            @foreach ($boms as $bom)
                                <option value="{{ $bom->id }}">{{ $bom->name }}</option>
                            @endforeach
                        </select>
                        @error('bom_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
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
                        @error('unit_cost')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
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
                        @error('quantity')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Hidden Total Cost -->
                <input type="hidden" name="total_cost" id="total_cost">
            </div>

            <!-- Form Actions -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('suppliers.show', $supplier) }}" class="btn-secondary">
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
@endsection