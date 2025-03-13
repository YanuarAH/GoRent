<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoRent - Car Rental Service</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <a href="#" class="font-medium">Vehicles</a>
            <a href="#" class="font-medium">Details</a>
            <a href="#" class="font-medium">About Us</a>
            <a href="#" class="font-medium">Contact Us</a>
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
    
    <!-- Features Section -->
    <section class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Availability Feature -->
            <div class="flex flex-col items-center text-center">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Availability</h3>
                <p class="text-sm text-gray-600">Diam tincidunt facilisis erat et semper fermentum. Id ornicus quis.</p>
            </div>
            
            <!-- Comfort Feature -->
            <div class="flex flex-col items-center text-center">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Comfort</h3>
                <p class="text-sm text-gray-600">Gravida auctor fermentum morbi vulputate in gravida curabitur convallis.</p>
            </div>
            
            <!-- Savings Feature -->
            <div class="flex flex-col items-center text-center">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12">
                        <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                        <line x1="2" y1="10" x2="22" y2="10"></line>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Savings</h3>
                <p class="text-sm text-gray-600">Pretium convallis id diam sed commodo vestibulum laoreet adipisci.</p>
            </div>
        </div>
    </section>
    
    <!-- Car Selection Section -->
    <section class="container mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Choose the car that suits you</h2>
            <a href="#" class="flex items-center text-sm font-medium">
                View All
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 ml-1">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Car 1 -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="bg-white rounded-lg p-6 mb-4">
                    <img src="/placeholder.svg?height=120&width=240" alt="Mercedes" class="mx-auto h-24 object-contain">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-semibold">Mercedes</h3>
                        <p class="text-sm text-gray-500">Sedan</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-indigo-600">$25</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        Automatic
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                        26 l/h
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                            <path d="M10 13V7h2"></path>
                            <path d="M14 13V9h2"></path>
                            <path d="M18 13V11h2"></path>
                        </svg>
                        Air Conditioner
                    </div>
                </div>
                <a href="#" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
            </div>
            
            <!-- Car 2 -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="bg-white rounded-lg p-6 mb-4">
                    <img src="/placeholder.svg?height=120&width=240" alt="Mercedes" class="mx-auto h-24 object-contain">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-semibold">Mercedes</h3>
                        <p class="text-sm text-gray-500">Sedan</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-indigo-600">$45</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        Automatic
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                        26 l/h
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                            <path d="M10 13V7h2"></path>
                            <path d="M14 13V9h2"></path>
                            <path d="M18 13V11h2"></path>
                        </svg>
                        Air Conditioner
                    </div>
                </div>
                <a href="#" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
            </div>
            
            <!-- Car 3 -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="bg-white rounded-lg p-6 mb-4">
                    <img src="/placeholder.svg?height=120&width=240" alt="Mercedes" class="mx-auto h-24 object-contain">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-semibold">Mercedes</h3>
                        <p class="text-sm text-gray-500">SUV</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-indigo-600">$50</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        Automatic
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                        26 l/h
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                            <path d="M10 13V7h2"></path>
                            <path d="M14 13V9h2"></path>
                            <path d="M18 13V11h2"></path>
                        </svg>
                        Air Conditioner
                    </div>
                </div>
                <a href="#" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
            </div>
            
            <!-- Car 4 -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="bg-white rounded-lg p-6 mb-4">
                    <img src="/placeholder.svg?height=120&width=240" alt="Porsche" class="mx-auto h-24 object-contain">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-semibold">Porsche</h3>
                        <p class="text-sm text-gray-500">SUV</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-indigo-600">$40</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        Automatic
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                        26 l/h
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                            <path d="M10 13V7h2"></path>
                            <path d="M14 13V9h2"></path>
                            <path d="M18 13V11h2"></path>
                        </svg>
                        Air Conditioner
                    </div>
                </div>
                <a href="#" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
            </div>
            
            <!-- Car 5 -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="bg-white rounded-lg p-6 mb-4">
                    <img src="/placeholder.svg?height=120&width=240" alt="Toyota" class="mx-auto h-24 object-contain">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-semibold">Toyota</h3>
                        <p class="text-sm text-gray-500">Sedan</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-indigo-600">$35</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        Automatic
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                        26 l/h
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                            <path d="M10 13V7h2"></path>
                            <path d="M14 13V9h2"></path>
                            <path d="M18 13V11h2"></path>
                        </svg>
                        Air Conditioner
                    </div>
                </div>
                <a href="#" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
            </div>
            
            <!-- Car 6 -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="bg-white rounded-lg p-6 mb-4">
                    <img src="/placeholder.svg?height=120&width=240" alt="Porsche" class="mx-auto h-24 object-contain">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-semibold">Porsche</h3>
                        <p class="text-sm text-gray-500">SUV</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-indigo-600">$50</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        Automatic
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                        26 l/h
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                            <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                            <path d="M10 13V7h2"></path>
                            <path d="M14 13V9h2"></path>
                            <path d="M18 13V11h2"></path>
                        </svg>
                        Air Conditioner
                    </div>
                </div>
                <a href="#" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
            </div>
        </div>
    </section>
    
    <!-- Facts Section -->
    <section class="bg-indigo-600 py-16 mt-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-white text-center mb-8">Facts In Numbers</h2>
            <p class="text-white text-center mb-12 max-w-2xl mx-auto">Amet cras nec lectus. Faucibus ipsum eget lacinia nibh volutate ullamcorper in. Diam tincidunt tincidunt erat et semper fermentum.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg p-6 flex items-center">
                    <div class="bg-amber-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold">540+</p>
                        <p class="text-sm text-gray-500">Cars</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 flex items-center">
                    <div class="bg-amber-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold">20k+</p>
                        <p class="text-sm text-gray-500">Customers</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 flex items-center">
                    <div class="bg-amber-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                            <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                            <path d="M20 12a8 8 0 1 0-16 0"></path>
                            <path d="M12 12v-8"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold">25+</p>
                        <p class="text-sm text-gray-500">Years</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 flex items-center">
                    <div class="bg-amber-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold">20m+</p>
                        <p class="text-sm text-gray-500">Miles</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="bg-indigo-600 py-16 relative">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-2xl font-bold text-white mb-4">Enjoy every mile with adorable companionship.</h2>
                <p class="text-white mb-6">Amet cras nec lectus. Faucibus ipsum eget lacinia nibh volutate ullamcorper in. Diam tincidunt tincidunt erat.</p>
                
                <form class="flex">
                    <input type="text" placeholder="City" class="px-4 py-2 rounded-l-md w-full focus:outline-none">
                    <button type="submit" class="bg-amber-500 text-white px-4 py-2 rounded-r-md font-medium">Search</button>
                </form>
            </div>
            <div class="md:w-1/2 relative">
                <img src="/placeholder.svg?height=300&width=400" alt="Car silhouette" class="w-full opacity-50">
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Info -->
                <div>
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        <span class="ml-2 font-bold">GoRent</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Faucibus faucibus pellentesque dictum turpis. Id pellentesque turpis massa a id lacus lorem ipsum.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Address -->
                <div>
                    <h3 class="font-semibold mb-4">Address</h3>
                    <p class="text-sm text-gray-600 mb-2">GoRent Ave, Gary, NC 27511</p>
                </div>
                
                <!-- Useful Links -->
                <div>
                    <h3 class="font-semibold mb-4">Useful links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">About us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Contact us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Gallery</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Blog</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Vehicles -->
                <div>
                    <h3 class="font-semibold mb-4">Vehicles</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Sedan</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Compact</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Pickup</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Minivan</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">SUV</a></li>
                    </ul>
                </div>
                
                <!-- Download App -->
                <div class="md:col-span-4 mt-8">
                    <h3 class="font-semibold mb-4">Download App</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="block">
                            <img src="/placeholder.svg?height=40&width=120" alt="App Store" class="h-10">
                        </a>
                        <a href="#" class="block">
                            <img src="/placeholder.svg?height=40&width=120" alt="Google Play" class="h-10">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 mt-12 pt-8 text-center text-sm text-gray-600">
                <p>&copy; Copyright Car Rental 2024. Design by Figma Guru</p>
            </div>
        </div>
    </footer>
</body>
</html>

