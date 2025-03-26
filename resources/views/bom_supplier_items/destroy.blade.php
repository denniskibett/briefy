@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Delete Bom Supplier Item</h1>
    <p>Are you sure you want to delete this item?</p>
    <form action="{{ route('bom_supplier_items.destroy', $bomSupplierItem->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
