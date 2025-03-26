@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bom Supplier Item</h1>
    <form action="{{ route('bom_supplier_items.update', $bomSupplierItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bom_supplier_id">Bom Supplier</label>
            <select name="bom_supplier_id" id="bom_supplier_id" class="form-control" required>
                @foreach($bomSuppliers as $bomSupplier)
                    <option value="{{ $bomSupplier->id }}" {{ $bomSupplier->id == $bomSupplierItem->bom_supplier_id ? 'selected' : '' }}>
                        {{ $bomSupplier->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $bomSupplierItem->item_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
