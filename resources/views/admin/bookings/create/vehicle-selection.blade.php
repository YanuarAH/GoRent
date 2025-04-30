@extends('layouts.admin')

@section('title', 'Select Vehicle')
@section('header', 'Select Vehicle')

@section('content')
<div class="mb-6">
    <a href="{{ route('bookings.manage.create.date-selection', ['user_id' => $user->id]) }}" class="flex items-center text-blue-600 hover:text-blue-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Date Selection
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Booking Details</h2>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-center bg-blue-50 p-4 rounded-lg">
                <div class="flex-shrink-0 bg-blue-100 rounded-full p-2">
                    <i class="fas fa-user text-blue-500"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700">Customer:</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
            
            <div class="flex items-center bg-green-50 p-4 rounded-lg">
                <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                    <i class="fas fa-calendar text-green-500"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700">Rental Period:</p>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ \Carbon\Carbon::parse($rentalDate)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($returnDate)->format('M d, Y') }}
                    </p>
                    <p class="text-sm text-gray-500">{{ $rentalDuration }} {{ Str::plural('day', $rentalDuration) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="text-xl font-bold mb-4">Available Vehicles</h2>

@if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 p-4 mb-6 rounded">
        {{ session('error') }}
    </div>
@endif

@if(count($vehicles) > 0)
    <!-- Vehicle Type Filters -->
    <div class="flex flex-wrap justify-center gap-4 mb-8">
        <a href="{{ route('bookings.manage.create.vehicle-selection', ['type' => 'all', 'rental_date' => $rentalDate, 'return_date' => $returnDate, 'user_id' => $user->id]) }}"
            class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            All vehicles
        </a>

        @foreach($vehicleTypes as $vehicleType)
            <a href="{{ route('bookings.manage.create.vehicle-selection', ['type' => $vehicleType, 'rental_date' => $rentalDate, 'return_date' => $returnDate, 'user_id' => $user->id]) }}"
                class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === $vehicleType ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800' }}">
                <i class="fas fa-car mr-2"></i>
                {{ ucfirst($vehicleType) }}
            </a>
        @endforeach
    </div>

    <!-- Vehicle Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($vehicles as $vehicle)
            <div class="bg-gray-50 rounded-lg p-6">
                <div class="bg-white rounded-lg p-6 mb-4 flex items-center justify-center h-48">
                    @if($vehicle->image)
                        <img src="{{ asset('storage/' . $vehicle->image) }}" alt="{{ $vehicle->brand }}" class="h-32 object-contain">
                    @else
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <i class="fas fa-car text-5xl"></i>
                            <span class="mt-2 text-sm">No image available</span>
                        </div>
                    @endif
                </div>

                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-xl font-semibold">{{ $vehicle->brand }}</h3>
                        <p class="text-sm text-gray-500">{{ ucfirst($vehicle->type) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-blue-600">Rp {{ number_format($vehicle->price, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-500">per day</p>
                    </div>
                </div>

                <div class="flex justify-between mb-6">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-car-alt mr-1"></i>
                        {{ ucfirst($vehicle->condition) }}
                    </div>

                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $vehicle->year }}
                    </div>

                    <div class="flex items-center text-sm text-gray-600">
                        <div class="w-3 h-3 rounded-full mr-1.5 border border-gray-300" style="background-color: {{ strtolower($vehicle->color) }};">
                        </div>
                        {{ ucfirst($vehicle->color) }}
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4 mb-4">
                    <div class="flex justify-between font-medium">
                        <span>Total for {{ $rentalDuration }} {{ Str::plural('day', $rentalDuration) }}:</span>
                        <span class="text-blue-600">Rp {{ number_format($vehicle->price * $rentalDuration, 0, ',', '.') }}</span>
                    </div>
                </div>

                <form action="{{ route('bookings.manage.create.complete-booking') }}" method="GET">
                    <input type="hidden" name="rental_date" value="{{ $rentalDate }}">
                    <input type="hidden" name="return_date" value="{{ $returnDate }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Select This Vehicle
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-yellow-50 border border-yellow-400 text-yellow-700 px-4 py-8 rounded text-center">
        <h2 class="text-xl font-semibold mb-2">No Vehicles Available</h2>
        <p>Sorry, there are no vehicles available for the selected dates. Please try different dates.</p>
        <a href="{{ route('bookings.manage.create.date-selection', ['user_id' => $user->id]) }}" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Change Dates
        </a>
    </div>
@endif
@endsection
