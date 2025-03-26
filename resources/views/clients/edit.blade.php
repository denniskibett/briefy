@extends('layouts.app')

@section('content')
    <main>
        <!-- Breadcrumb Start -->
        <div x-data="{ pageName: 'Client' }">
            @include('partials.breadcrumb', ['pageName' => 'Client'])
        </div>
        <!-- Breadcrumb End -->

        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Edit Client</h3>
            </div>

            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Client Name -->
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Client Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Contact Name -->
                        <div>
                            <label for="contact_name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Contact Name</label>
                            <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name', $client->contact_name) }}" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $client->address) }}" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $client->location) }}" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Tax PIN -->
                        <div>
                            <label for="tax_pin" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Tax PIN</label>
                            <input type="text" name="tax_pin" id="tax_pin" value="{{ old('tax_pin', $client->tax_pin) }}" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Phone Number -->
                        <div x-data="{
                            selectedCountry: 'KE',
                            countryCodes: {
                                'KE': '+254',
                                'US': '+1',
                                'GB': '+44',
                                'CA': '+1',
                                'AU': '+61'
                            },
                            phoneNumber: '{{ old('phone', $client->phone) }}'
                        }">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Phone Number</label>
                            <div class="relative">
                                <div class="absolute">
                                    <select
                                        x-model="selectedCountry"
                                        @change="phoneNumber = countryCodes[selectedCountry]"
                                        class="appearance-none rounded-l-lg border-0 border-r border-gray-200 bg-transparent bg-none py-3 pl-3.5 pr-8 leading-tight text-gray-700 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-800 dark:text-gray-400"
                                    >
                                        <option value="KE" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">KE</option>
                                        <option value="US" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">US</option>
                                        <option value="GB" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">GB</option>
                                        <option value="CA" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">CA</option>
                                        <option value="AU" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">AU</option>
                                        <!-- Add more country codes as needed -->
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                <input
                                    placeholder="+254 712 345 678"
                                    x-model="phoneNumber"
                                    type="tel"
                                    class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-[84px] pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                />
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Category</label>
                            <div x-data="{ isOptionSelected: {{ old('category_id', $client->category_id) ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
                                <select 
                                    name="category_id" 
                                    id="category_id" 
                                    required
                                    class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                    @change="isOptionSelected = true"
                                >
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $client->category_id) == $category->id ? 'selected' : '' }} class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="pointer-events-none absolute right-4 top-1/2 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div x-data="{ status: {{ old('status', $client->status) ? 'true' : 'false' }} }">
                            <label for="status" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                            <input type="hidden" name="status" :value="status ? 1 : 0">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" id="status" class="sr-only" @change="status = !status">
                                    <div class="block w-14 h-8 rounded-full transition duration-300" :class="status ? 'bg-blue-500' : 'bg-gray-300'"></div>
                                    <div class="absolute left -1 top-1 w-6 h-6 bg-white rounded-full shadow-md transform transition duration-300" :class="status ? 'translate-x-6' : 'translate-x-0'"></div>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">
                                    <span x-text="status ? 'Active' : 'Inactive'"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="h-11 w-full rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:bg-brand-500 dark:hover:bg-brand-600 dark:focus:ring-brand-700 sm:w-auto">
                        Update Client
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection