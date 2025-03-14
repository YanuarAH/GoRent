<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="antialiased bg-white">
    <!-- Header -->
    <header class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8">
                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                    <circle cx="7" cy="17" r="2"></circle>
                    <circle cx="17" cy="17" r="2"></circle>
                </svg>
                <span class="ml-2 font-bold text-lg">GoRent</span>
            </a>
        </div>
        
        <nav class="hidden md:flex items-center space-x-6">
            <a href="/" class="font-medium">Home</a>
            <a href="{{ url('/vehicles') }}" class="font-medium">Vehicles</a>
            <a href="{{ url('/booking') }}" class="font-medium">Booking</a>
            <a href="{{ url('/about') }}" class="font-medium">About Us</a>
            <a href="{{ url('/contact') }}" class="font-medium">Contact Us</a>
        </nav>
        
        <div class="flex items-center">
            <a href="{{ route('login') }}">
                <button type="button" class="hidden md:flex items-center text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                    Login
                </button>
            </a>
            <button class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </header>
</body>
</html>