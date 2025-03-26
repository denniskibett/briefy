@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-5">Edit Item</h2>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Item Name</label>
            <input type="text" name="name" id="name" value="{{ $item->name }}" class="input" required>
        </div>
        <!-- Category Dropdown -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Category</label>
            <select name="category_id" id="category_id" class="w-full rounded-lg border border-gray-300 px-4 py-2 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" value="{{ $item->unit }}" class="input">
        </div>
        
        <div>
            <label for="MOU">MOU</label>
            <input type="text" name="MOU" id="MOU" value="{{ $item->MOU }}" class="input"> <!-- Corrected name attribute -->
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
@endsection
