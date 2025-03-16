@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Select a vehicle group</h1>
    
    <!-- Vehicle Type Filters -->
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <a href="{{ route('vehicles', ['type' => 'all']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            All vehicles
        </a>
        
        <a href="{{ route('vehicles', ['type' => 'sedan']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'sedan' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            Sedan
        </a>
        
        <a href="{{ route('vehicles', ['type' => 'city car']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'city car' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            City Car
        </a>
        
        <a href="{{ route('vehicles', ['type' => 'pickup']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'pickup' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            Pickup
        </a>
        
        <a href="{{ route('vehicles', ['type' => 'suv']) }}" 
           class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'suv' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            SUV
        </a>
        
        <a href="{{ route('vehicles', ['type' => 'minivan']) }}" 
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
                    <p class="text-xl font-bold text-indigo-600">${{ $vehicle->price }}</p>
                    <p class="text-xs text-gray-500">per day</p>
                </div>
            </div>
            
            <div class="flex justify-between mb-6">
                <div class="flex items-center text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-1">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                        <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                        <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                        <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                        <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                        <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                    </svg>
                    {{ ucfirst($vehicle->condition) }}
                </div>
                
                <div class="flex items-center text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-1">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    PB 95
                </div>
                
                <div class="flex items-center text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-1">
                        <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0"></path>
                        <path d="M10 13V7h2"></path>
                        <path d="M14 13V9h2"></path>
                        <path d="M18 13V11h2"></path>
                    </svg>
                    Air Conditioner
                </div>
            </div>
            
            <a href="{{ route('vehicles.details', $vehicle->id) }}" class="block w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-center rounded-md font-medium transition duration-200">
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

