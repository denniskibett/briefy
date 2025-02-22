@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6">
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Buttons`}">
        @include('partials.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <!-- Primary Button -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Primary Button
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                @include('partials.buttons.button-01')
            </div>
        </div>

        <!-- Primary Button with Left Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Primary Button with Left Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                @include('partials.buttons.button-02')
            </div>
        </div>

        <!-- Primary Button with Right Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Primary Button with Right Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                @include('partials.buttons.button-03')
            </div>
        </div>

        <!-- Secondary Button -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Secondary Button
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                @include('partials.buttons.button-04')
            </div>
        </div>

        <!-- Secondary Button with Left Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Secondary Button with Left Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                @include('partials.buttons.button-05')
            </div>
        </div>

        <!-- Secondary Button with Right Icon -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Secondary Button with Right Icon
                </h3>
            </div>
            <div class="border-t border-gray-100 px-6 py-6.5 dark:border-gray-800">
                @include('partials.buttons.button-06')
            </div>
        </div>
    </div>
</div>
@endsection
