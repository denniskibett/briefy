@extends('layouts.app')

@section('content')
    <div class="container mx-auto mb-5">
        <h2 class="text-2xl font-semibold mb-5">Add New Supplier</h2>

        <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Supplier Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>
            
            <div class="mb-4">
                <label for="contact_name" class="block text-gray-700 font-medium">Contact Name</label>
                <input type="text" name="contact_name" id="contact_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-medium">Phone Number</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" required>
            </div>
            
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input type="text" name="address" id="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-medium">Location</label>
                <input type="text" name="location" id="location" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-medium">Industry Category</label>
                <input type="text" name="category_id" id="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-4">
                <label for="tax_pin" class="block text-gray-700 font-medium">Tax PIN</label>
                <input type="text" name="tax_pin" id="tax_pin" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Add Supplier</button>
        </form>
    </div>
@endsection