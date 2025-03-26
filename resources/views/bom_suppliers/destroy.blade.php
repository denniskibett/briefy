@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Remove BOM Assignment</h1>

    <p>Are you sure you want to remove the BOM assignment for <strong>{{ $bomAssignment->bom->name }}</strong> from supplier <strong>{{ $supplier->name }}</strong>?</p>

    <form action="{{ route('bom_suppliers.destroy', [$supplier, $bomAssignment->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">
            Yes, Remove
        </button>
        <a href="{{ route('suppliers.show', $supplier) }}" class="ml-4 text-blue-500 hover:underline">
            Cancel
        </a>
    </form>
</div>
@endsection
