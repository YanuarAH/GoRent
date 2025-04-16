@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('booking.index') }}" class="inline-flex items-center text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            Back to Rental Form
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-2">Available Vehicles</h1>
    <p class="text-gray-600 mb-8">
        For {{ \Carbon\Carbon::parse($rental_date)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($return_date)->format('M d, Y') }}
        ({{ $rental_duration }} {{ Str::plural('day', $rental_duration) }})
    </p>

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        {{ session('error') }}
    </div>
    @endif

    @if(count($vehicles) > 0)
    <!-- Vehicle Type Filters -->
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <a href="{{ route('booking.check-availability', ['type' => 'all', 'rental_date' => $rental_date, 'return_date' => $return_date]) }}"
            class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            All vehicles
        </a>

        @foreach($vehicleTypes as $vehicleType)
        <a href="{{ route('booking.check-availability', ['type' => $vehicleType, 'rental_date' => $rental_date, 'return_date' => $return_date]) }}"
            class="inline-flex items-center px-6 py-2 rounded-full {{ $activeType === $vehicleType ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            {{ ucfirst($vehicleType) }}
        </a>
        @endforeach
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

            <div class="border-t border-gray-200 pt-4 mb-4">
                <div class="flex justify-between font-medium">
                    <span>Total for {{ $rental_duration }} {{ Str::plural('day', $rental_duration) }}:</span>
                    <span class="text-indigo-600">${{ number_format($vehicle->price * $rental_duration, 2) }}</span>
                </div>
            </div>

            <form action="{{ route('booking.book-vehicle', $vehicle->id) }}" method="GET">
                <input type="hidden" name="rental_date" value="{{ $rental_date }}">
                <input type="hidden" name="return_date" value="{{ $return_date }}">
                <button type="submit" class="w-full py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Rent This Vehicle
                </button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-yellow-50 border border-yellow-400 text-yellow-700 px-4 py-8 rounded text-center">
        <h2 class="text-xl font-semibold mb-2">No Vehicles Available</h2>
        <p>Sorry, there are no vehicles available for the selected dates. Please try different dates.</p>
        <a href="{{ route('booking.index') }}" class="inline-block mt-4 px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            Change Dates
        </a>
    </div>
    @endif
</div>
@endsection