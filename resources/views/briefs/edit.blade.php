@extends('layouts.app')

@section('content')
    <main>
        <!-- Breadcrumb Start -->
        <div x-data="{ pageName: 'Brief' }">
            @include('partials.breadcrumb', ['pageName' => 'Brief'])
        </div>
        <!-- Breadcrumb End -->

        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Edit Brief</h3>
            </div>

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('briefs.update', $brief->id) }}" method="POST" class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Industry Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Industry Category</label>
                            <select name="category_id" id="category_id" class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                @foreach($industryCategories as $category)
                                    <option value="{{ $category->id }}" {{ $brief->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Brief Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Brief Name</label>
                            <input type="text" name="name" id="name" value="{{ $brief->name }}" required 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Brief Handler -->
                        <div>
                            <label for="brief_handler" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Brief Handler</label>
                            <input type="text" name="brief_handler" id="brief_handler" value="{{ $brief->brief_handler }}" required 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Client -->
                        <div>
                            <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Client</label>
                            <select name="client_id" id="client_id" class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $brief->client_id == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="text-sm text-gray-600 mt-1">
                                If no client exists, <a href="{{ route('clients.create') }}" class="text-blue-500">add one</a>.
                            </div>
                        </div>

                        <!-- Contact Person -->
                        <div>
                            <label for="contact_person" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" value="{{ $brief->contact_person }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Start Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $brief->start_date }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- End Date -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-400">End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $brief->end_date }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Budget -->
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Budget (KES)</label>
                            <input type="number" name="budget" id="budget" value="{{ $brief->budget }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Production Cost -->
                        <div>
                            <label for="production_cost" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Production Cost (KES)</label>
                            <input type="number" name="production_cost" id="production_cost" value="{{ $brief->production_cost }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Contract Agreement -->
                        <div>
                            <label for="contract_agreement" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Contract Agreement</label>
                            <input type="text" name="contract_agreement" id="contract_agreement" value="{{ $brief->contract_agreement }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Payment Mode -->
                        <div>
                            <label for="payment_mode" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Payment Mode</label>
                            <select name="payment_mode" id="payment_mode" 
                                class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                                <option value="Card" {{ $brief->payment_mode === 'Card' ? 'selected' : '' }}>Card</option>
                                <option value="Mobile Money" {{ $brief->payment_mode === 'Mobile Money' ? 'selected' : '' }}>Mobile Money</option>
                                <option value="Bank" {{ $brief->payment_mode === 'Bank' ? 'selected' : '' }}>Bank</option>
                                <option value="Cash" {{ $brief->payment_mode === 'Cash' ? 'selected' : '' }}>Cash</option>
                            </select>
                        </div>

                        <!-- Transaction Code -->
                        <div>
                            <label for="transaction_code" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Transaction Code</label>
                            <input type="text" name="transaction_code" id="transaction_code" value="{{ $brief->transaction_code }}" 
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        </div>

                        <!-- Status Toggle -->
                        <div x-data="{ status: {{ old('status', $brief->status) === 1 ? 'true' : 'false' }} }">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                            <input type="hidden" name="status" :value="status ? 1 : 0">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" id="status" class="sr-only" @change="status = !status">
                                    <div class="block w-14 h-8 rounded-full transition duration-300" :class="status ? 'bg-blue-500' : 'bg-gray-300'"></div>
                                    <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md transform transition duration-300" :class="status ? 'translate-x-6' : 'translate-x-0'"></div>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700" x-text="status ? 'Closed' : 'Open'"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="mt-5 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update Brief</button>
            </form>
        </div>
    </main>
@endsection