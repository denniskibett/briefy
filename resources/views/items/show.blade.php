@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-semibold mb-5">Items</h2>

        <div class="mb-4">
            <a href="{{ route('items.create') }}" class="btn btn-primary">
                Add New Item
            </a>
        </div>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Item Name</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Unit</th>
                    <th class="py-2 px-4 border-b">MOU</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->category }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->unit }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->MOU }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('items.edit', $item->id) }}" class="text-green-600 hover:underline">Edit</a> |
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center">No items available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
