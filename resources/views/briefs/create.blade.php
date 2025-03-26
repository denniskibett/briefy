@extends('layouts.app')

@section('content')
<main>
        <!-- Breadcrumb Start -->
        <div x-data="{ pageName: 'Briefs' }">
        @include('partials.breadcrumb', ['pageName' => 'Add New Briefs'])
    </div>
    <!-- Breadcrumb End -->

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Add New Brief</h3>
            </div>

            <form action="{{ route('briefs.store') }}" method="POST" class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                @csrf
                
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Industry Category -->
                        <div>
                            <label for="category_id" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Industry Category
                            </label>
                            <select name="category_id" id="category_id" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Select an Industry Category</option>
                                @foreach($industryCategories as $category)
                                    <option value="{{ $category->id }}" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Brief Name -->
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Brief Name
                            </label>
                            <input type="text" name="name" id="name" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Brief Handler -->
                        <div>
                            <label for="brief_handler" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Brief Handler
                            </label>
                            <input type="text" name="brief_handler" id="brief_handler" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Budget (KES) -->
                        <div>
                            <label for="budget" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Budget (KES)
                            </label>
                            <input type="text" name="budget" id="budget" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Payment Mode -->
                        <div>
                            <label for="payment_mode" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Payment Mode
                            </label>
                            <select name="payment_mode" id="payment_mode" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Select an Industry Category</option>
                                <option value="Card" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Card</option>
                                <option value="Mobile Money" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Mobile Money</option>
                                <option value="Bank" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Bank</option>
                                <option value="Cash" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Cash</option>
                                
                            </select>
                        </div>
                        <!-- Date Picker -->
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400" >
                                Start Date
                            </label>

                            <div class="relative">
                                <input
                                type="date"
                                placeholder="Select date"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                onclick="this.showPicker()"
                                name="start_date" id="start_date"
                                />
                                <span
                                class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400"
                                >
                                <svg
                                    class="fill-current"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z"
                                    fill=""
                                    />
                                </svg>
                                </span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div x-data="{ status: 0 }">
                            <label for="status" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                            <input type="hidden" name="status" :value="status">
                            
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" id="status" class="sr-only" @change="status = status === 1 ? 0 : 1">
                                    <div class="block w-14 h-8 rounded-full transition duration-300" :class="status === 1 ? 'bg-blue-500' : 'bg-gray-300'"></div>
                                    <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md transform transition duration-300" :class="status === 1 ? 'translate-x-6' : 'translate-x-0'"></div>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">
                                    <span x-text="status === 1 ? 'Active' : 'Inactive'"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Client -->
                        <div>
                            <label for="client_id" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Client
                            </label>
                            <select name="client_id" id="client_id" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" 
                                onchange="populateContactName()">
                                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">Select a Client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="text-sm text-gray-600">
                                If no client exists, <a href="{{ route('clients.create') }}" class="text-blue-500">add one</a>.
                            </div>
                        </div>
                        <!-- Contact Name -->
                        <div>
                            <label for="contact_person" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Contact Person
                            </label>
                            <input type="text" name="contact_person" id="contact_person" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <!-- Production Cost (KES) -->
                        <div>
                            <label for="production_cost" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Production Cost (KES)
                            </label>
                            <input type="text" name="production_cost" id="production_cost" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <!-- Contract Agreement -->
                        <div>
                            <label for="contract_agreement" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Contract Agreement
                            </label>
                            <input type="text" name="contract_agreement" id="contract_agreement" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <!-- Transaction Code -->
                        <div>
                            <label for="transaction_code" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Transaction Code
                            </label>
                            <input type="text" name="transaction_code" id="transaction_code" required 
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        <!-- Date Picker -->
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400" >
                                End Date 
                            </label>

                            <div class="relative">
                                <input
                                type="date"
                                placeholder="Select date"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                onclick="this.showPicker()"
                                name="end_date" id="end_date"
                                />
                                <span
                                class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400"
                                >
                                <svg
                                    class="fill-current"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z"
                                    fill=""
                                    />
                                </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" 
                        class="h-11 w-full rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:bg-brand-500 dark:hover:bg-brand-600 dark:focus:ring-brand-700 sm:w-auto">
                        Add Brief
                    </button>
                </div>
            </form>
    </div>

</main>
<script>
    function populateContactName() {
        const clientSelect = document.getElementById('client_id');
        const contactPersonInput = document.getElementById('contact_person');

        // Get the selected option
        const selectedOption = clientSelect.options[clientSelect.selectedIndex];

        // Set the contact person's name if available, or clear the input for manual entry
        contactPersonInput.value = selectedOption.dataset.contact || '';
    }
</script>
@endsection
