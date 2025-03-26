@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit BOM Assignment for Supplier: {{ $supplier->name }}</h1>

    <form action="{{ route('bom_suppliers.update', [$supplier, $bomAssignment->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="bom_id" class="block text-gray-700 font-bold mb-2">BOM:</label>
            <select name="bom_id" id="bom_id" class="form-control" >
                @foreach ($boms as $bom)
                    <option value="{{ $bom->id }}" {{ $bom->id == $bomAssignment->bom_id ? 'selected' : '' }}>
                        {{ $bom->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="unit_cost" class="block text-gray-700 font-bold mb-2">Unit Cost:</label>
            <input type="number" step="0.01" name="unit_cost" id="unit_cost" class="form-control"
                   value="{{ $bomAssignment->pivot->unit_cost }}">
            @error('unit_cost')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control"
                   value="{{ $bomAssignment->pivot->quantity }}">
            @error('quantity')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="total_cost" class="block text-gray-700 font-bold mb-2">Total Cost:</label>
            <input type="number" step="0.01" name="total_cost" id="total_cost" class="form-control"
                   value="{{ $bomAssignment->pivot->total_cost }}">
            @error('total_cost')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
            Update BOM Assignment
        </button>
    </form>
</div>
@endsection
