@extends('layouts.app')

@section('content')
<main>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Create BoM Supplier Item' }">
        @include('partials.breadcrumb', ['pageName' => 'Create BoM Supplier Item'])
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">
            Create BoM Supplier Item for {{ $item->name }}
        </h3>

        <form action="{{ route('bom_supplier_items.store', ['client_id' => $client_id, 'brief_id' => $brief_id, 'item_id' => $item->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">

            <div class="mb-6 rounded-2xl border border-gray-200 p-5 dark:border-gray-800 lg:p-6">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                    <!-- BoM Supplier Dropdown -->
                    <div class="w-full">
                        <label class="mb-2 block text-xs font-medium text-gray-500 dark:text-gray-400">
                            Select BoM Supplier
                        </label>
                        <select 
                            name="bom_supplier_id" 
                            id="bom_supplier_id" 
                            required
                            class="w-full rounded-lg border border-gray-200 bg-transparent p-3 text-sm font-medium text-gray-900 outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 dark:border-gray-700 dark:text-white/90"
                        >
                            <option value="" disabled selected>-- Choose Bill of Material for the Item --</option>
                            @foreach ($bomSuppliers as $supplier)
                                <option value="{{ $supplier->id }}">
                                    {{ $supplier->name }}
                                    (BoM: {{ $supplier->bom->name ?? 'No BoM Info' }})
                                </option>
                            @endforeach
                        </select>
                        @error('bom_supplier_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Display BoM Details -->
                <div id="bom-details" class="mt-5 hidden rounded-lg border border-gray-100 p-4 dark:border-gray-800">
                    <h5 class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">BoM Details:</h5>
                    <p id="bom-info" class="text-sm text-gray-600 dark:text-gray-400"></p>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('items.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Add BoM Supplier Item
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const supplierDropdown = document.getElementById('bom_supplier_id');
        const bomDetailsDiv = document.getElementById('bom-details');
        const bomInfo = document.getElementById('bom-info');

        supplierDropdown.addEventListener('change', (event) => {
            const selectedOption = event.target.options[event.target.selectedIndex];
            const bomDetails = selectedOption.textContent.match(/BoM: (.*?)\)/)[1] || 'No details available';
            
            bomInfo.textContent = bomDetails;
            bomDetailsDiv.classList.remove('hidden');
        });
    });
</script>
@endsection