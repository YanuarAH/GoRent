@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Car Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold">BMW</h1>
            <div class="flex items-center mt-1">
                <span class="text-2xl font-bold text-indigo-600">$25</span>
                <span class="text-gray-500 ml-1">/ day</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Car Image Section -->
            <div>
                <!-- Main Car Image -->
                <div class="bg-white rounded-lg p-4 mb-4">
                    <img src="{{ asset('images/bmwi320.png') }}" alt="BMW" class="w-full h-auto object-contain">
                </div>
                
                <!-- Thumbnail Images -->
                <div class="grid grid-cols-3 gap-2">
                    <div class="bg-white rounded-lg p-2">
                        <img src="/placeholder.svg?height=80&width=120" alt="BMW Thumbnail 1" class="w-full h-auto object-cover">
                    </div>
                    <div class="bg-white rounded-lg p-2">
                        <img src="/placeholder.svg?height=80&width=120" alt="BMW Thumbnail 2" class="w-full h-auto object-cover">
                    </div>
                    <div class="bg-white rounded-lg p-2">
                        <img src="/placeholder.svg?height=80&width=120" alt="BMW Thumbnail 3" class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Car Details Section -->
            <div>
                <!-- Technical Specifications -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold mb-4">Technical Specification</h2>
                    
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Gear Box -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="flex justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                                    <circle cx="7" cy="17" r="2"></circle>
                                    <circle cx="17" cy="17" r="2"></circle>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium">Gear Box</p>
                                <p class="text-gray-500">Automat</p>
                            </div>
                        </div>
                        
                        <!-- Fuel -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="flex justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                                    <path d="M20 12a8 8 0 1 0-16 0"></path>
                                    <path d="M12 12v-8"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium">Fuel</p>
                                <p class="text-gray-500">Petrol</p>
                            </div>
                        </div>
                        
                        <!-- Doors -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="flex justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium">Doors</p>
                                <p class="text-gray-500">2</p>
                            </div>
                        </div>
                        
                        <!-- Air Conditioner -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="flex justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                                    <path d="M10 13V7h2"></path>
                                    <path d="M14 13V9h2"></path>
                                    <path d="M18 13V11h2"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium">Air Conditioner</p>
                                <p class="text-gray-500">Yes</p>
                            </div>
                        </div>
                        
                        <!-- Seats -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="flex justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium">Seats</p>
                                <p class="text-gray-500">5</p>
                            </div>
                        </div>
                        
                        <!-- Distance -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="flex justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                    <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium">Distance</p>
                                <p class="text-gray-500">500</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Car Equipment Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold mb-4">Car Equipment</h2>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-5 w-5 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">ABS</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-5 w-5 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">ABS</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-5 w-5 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">Air Bags</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-5 w-5 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">Air Bags</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-5 w-5 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">Cruise Control</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-5 w-5 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-700">Air Conditioner</span>
                        </div>
                    </div>
                </div>
                
                <!-- Owner Contact -->
                <div class="mb-8">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-sm">xxxxxxxxxx</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Other Cars Section -->
        <div class="mt-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Other cars</h2>
                <a href="#" class="flex items-center text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                    View All
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                            Automat
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                                <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                                <path d="M20 12a8 8 0 1 0-16 0"></path>
                                <path d="M12 12v-8"></path>
                            </svg>
                            PB 95
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
                            <p class="text-sm text-gray-500">Sport</p>
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
                            Automat
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                                <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                                <path d="M20 12a8 8 0 1 0-16 0"></path>
                                <path d="M12 12v-8"></path>
                            </svg>
                            PB 95
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
                            Automat
                        </div>
                        <div class="flex items-center text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                                <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                                <path d="M20 12a8 8 0 1 0-16 0"></path>
                                <path d="M12 12v-8"></path>
                            </svg>
                            PB 95
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
        </div>
    </div>
@endsection