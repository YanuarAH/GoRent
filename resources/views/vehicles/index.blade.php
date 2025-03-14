@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Select a Vehicle Group</h1>

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
@endsection