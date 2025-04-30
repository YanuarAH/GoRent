@extends('layouts.admin')

@section('title', 'Edit Vehicle')
@section('header', 'Edit Vehicle')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Edit Vehicle Details</h2>
    </div>

    <div class="p-6">
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 font-medium">Please correct the following errors:</p>
                        <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('vehicles.manage.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Brand/Model</label>
                        <div class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700">
                            {{ $vehicle->brand }}
                        </div>
                        <input type="hidden" name="brand" value="{{ $vehicle->brand }}">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Vehicle Type</label>
                        <div class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700 capitalize">
                            {{ $vehicle->type }}
                        </div>
                        <input type="hidden" name="type" value="{{ $vehicle->type }}">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                        <div class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700">
                            {{ $vehicle->year }}
                        </div>
                        <input type="hidden" name="year" value="{{ $vehicle->year }}">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">License Plate</label>
                        <div class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700">
                            {{ $vehicle->no_plat }}
                        </div>
                        <input type="hidden" name="no_plat" value="{{ $vehicle->no_plat }}">
                    </div>
                </div>
                
                <!-- Right Column -->
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                        <div class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700 flex items-center">
                            <div class="w-4 h-4 rounded-full mr-2 border border-gray-300" style="background-color: {{ strtolower($vehicle->color) }};"></div>
                            {{ $vehicle->color }}
                        </div>
                        <input type="hidden" name="color" value="{{ $vehicle->color }}">
                    </div>
                    
                    <div class="mb-4">
                        <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Condition</label>
                        <select name="condition" id="condition" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Normal" {{ old('condition', $vehicle->condition) == 'Normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Service" {{ old('condition', $vehicle->condition) == 'Service' ? 'selected' : '' }}>Service</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Rental Price (per day)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" name="price" id="price" value="{{ old('price', $vehicle->price) }}" 
                                   class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="ready" class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
                        <select name="ready" id="ready" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1" {{ old('ready', $vehicle->ready ? '1' : '0') == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('ready', $vehicle->ready ? '1' : '0') == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Vehicle Image Section -->
            @if($vehicle->image)
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Vehicle Image</label>
                <div class="mt-1 flex justify-center p-4 border border-gray-300 rounded-md">
                    <img src="{{ asset('storage/'.$vehicle->image) }}" alt="{{ $vehicle->brand }}" class="h-48 object-contain">
                </div>
            </div>
            @endif
            
            <!-- Submit Buttons -->
            <div class="mt-6 flex justify-end">
                <a href="{{ route('vehicles.manage.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mr-2">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
