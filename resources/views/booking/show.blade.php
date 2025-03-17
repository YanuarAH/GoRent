@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Show Available Car</h1>
    
    <!-- Vehicle Type Filters -->
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <a href="{{ route('show', ['type' => 'all']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            All vehicles
        </a>    
        
        <a href="{{ route('show', ['type' => 'sedan']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'sedan' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg> 
            Sedan
        </a>
        
        <a href="{{ route('show', ['type' => 'city car']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'city car' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            City Car
        </a>
        
        <a href="{{ route('show', ['type' => 'pickup']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'pickup' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            Pickup
        </a>
        
        <a href="{{ route('show', ['type' => 'suv']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'suv' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            SUV
        </a>
        
        <a href="{{ route('show', ['type' => 'minivan']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'minivan' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            Minivan
        </a>
    </div>
    
    <!-- Vehicle Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($vehicles as $vehicle)
        <div class="bg-gray-50 rounded-lg p-6">
            <div class="bg-white rounded-lg p-6 mb-4 flex items-center justify-center">
                @if($vehicle->image)
                    <img src="{{ asset('images/vehicles/' . $vehicle->image) }}" alt="{{ $vehicle->brand }}" class="h-32 object-contain">
                @else
                    <img src="/placeholder.svg?height=120&width=240" alt="{{ $vehicle->brand }}" class="h-32 object-contain">
                @endif
            </div>
            
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="text-xl font-semibold">{{ $vehicle->brand }}</h3>
                    <p class="text-sm text-gray-500">{{ ucfirst($vehicle->type) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xl font-bold text-indigo-600">{{ $vehicle->price }}</p>
                    <p class="text-xs text-gray-500">per day</p>
                </div>
            </div>
            
            <div class="flex justify-between mb-6">
                <div class="flex items-center text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <circle cx="17" cy="17" r="2"></circle>
                    </svg>
                    {{ ucfirst($vehicle->condition) }}
                </div>
                
                <div class="flex items-center text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                     {{ ucfirst($vehicle->year) }}
                </div>
                
                <div class="flex items-center text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                        <circle cx="13.5" cy="6.5" r="4"></circle>
                        <circle cx="19" cy="17" r="2"></circle>
                        <circle cx="6" cy="17" r="2"></circle>
                        <path d="M16 14h-5a2 2 0 0 0-1.95 1.55L8 19h8l-1.05-3.45A2 2 0 0 0 13 14Z"></path>
                    </svg>
                    <div class="w-3 h-3 rounded-full mr-1.5 border border-gray-300" style="background-color: {{ strtolower($vehicle->color) }};">
                    </div>
                     {{ ucfirst($vehicle->color) }}
                </div>
            </div>
            
            <a href="{{ route('showcar', ['id' => $vehicle->id]) }}" class="block w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-center rounded-md font-medium transition duration-200">
                View Details
            </a>
        </div>
        @endforeach
    </div>
    
    @if(count($vehicles) === 0)
    <div class="text-center py-12">
        <p class="text-gray-500 text-lg">No vehicles found. Please try a different filter.</p>
    </div>
    @endif
</div>
@endsection
