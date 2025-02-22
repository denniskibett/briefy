<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error - Page Not Found</title>
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
</head>
<body class="flex min-h-screen flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-400">
    
    <div class="w-full max-w-md text-center">
        <h1 class="mb-6 text-5xl font-bold text-gray-800 dark:text-white">ERROR</h1>
        
        <img src="{{ asset('images/error/404.svg') }}" alt="404" class="dark:hidden mx-auto">
        <img src="{{ asset('images/error/404-dark.svg') }}" alt="404" class="hidden dark:block mx-auto">
        
        <p class="mb-6 mt-6 text-lg">We can’t seem to find the page you are looking for!</p>
        
        <a href="{{ route('dashboard') }}" 
           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3.5 text-sm font-medium text-gray-700 shadow-md hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200">
            Back to Home Page
        </a>
    </div>

    <p class="absolute bottom-6 text-center text-sm text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} - Briefy
    </p>
</body>
</html>
