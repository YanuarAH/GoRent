@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('customer.history') }}" class="inline-flex items-center text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                    <path d="M19 12H5"></path>
                    <path d="M12 19l-7-7 7-7"></path>
                </svg>
                Back to Booking History
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-6 bg-indigo-50 border-b">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold">Booking Details</h1>
                        <p class="text-gray-600">Booking ID: #{{ $rental->id }}</p>
                    </div>
                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $rental->status_color }}">
                        {{ ucfirst($rental->effective_status) }}
                    </span>
                </div>
            </div>
            
            <div class="p-6">
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Reservation Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Booking Date</p>
                            <p class="font-medium">{{ $rental->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                        
                        @if($rental->payment_status == 'pending')
                        <div>
                            <p class="text-sm text-gray-600">Payment Deadline</p>
                            <p class="font-medium">
                                {{ $rental->created_at->addHour()->format('M d, Y h:i A') }}
                                @if($rental->is_expired)
                                    <span class="text-xs text-red-600 ml-2">Expired</span>
                                @else
                                    <span class="text-xs text-gray-500 ml-2">
                                        ({{ now()->diffForHumans($rental->created_at->addHour(), true) }} left)
                                    </span>
                                @endif
                            </p>
                        </div>
                        @endif
                        
                        <div>
                            <p class="text-sm text-gray-600">Pickup Date</p>
                            <p class="font-medium">{{ $rental->rental_date->format('M d, Y') }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Return Date</p>
                            <p class="font-medium">{{ $rental->return_date->format('M d, Y') }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Duration</p>
                            <p class="font-medium">{{ $rental->duration }} {{ Str::plural('day', $rental->duration) }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Total Price</p>
                            <p class="font-medium">${{ number_format($rental->total_payment, 2) }}</p>
                        </div>
                        
                        @if($rental->pickup_location)
                        <div>
                            <p class="text-sm text-gray-600">Pickup Location</p>
                            <p class="font-medium">{{ $rental->pickup_location }}</p>
                        </div>
                        @endif
                        
                        @if($rental->return_location)
                        <div>
                            <p class="text-sm text-gray-600">Return Location</p>
                            <p class="font-medium">{{ $rental->return_location }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Customer Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Name</p>
                            <p class="font-medium">{{ $rental->customer_name }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">ID Number (NIK)</p>
                            <p class="font-medium">{{ $rental->customer_nik }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Phone Number</p>
                            <p class="font-medium">{{ $rental->customer_phone }}</p>
                        </div>
                        
                        @if($rental->customer_gender)
                        <div>
                            <p class="text-sm text-gray-600">Gender</p>
                            <p class="font-medium">{{ ucfirst($rental->customer_gender) }}</p>
                        </div>
                        @endif
                        
                        @if($rental->customer_address)
                        <div class="md:col-span-2">
                            <p class="text-sm text-gray-600">Address</p>
                            <p class="font-medium">{{ $rental->customer_address }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Vehicle Information</h2>
                    
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 mb-4 md:mb-0 md:pr-6">
                            @if($rental->vehicle->image)
                                <img src="{{ asset('images/vehicles/' . $rental->vehicle->image) }}" alt="{{ $rental->vehicle->brand }}" class="w-full rounded-lg">
                            @else
                                <img src="/placeholder.svg?height=200&width=300" alt="{{ $rental->vehicle->brand }}" class="w-full rounded-lg">
                            @endif
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $rental->vehicle->brand }}</h3>
                                    <p class="text-gray-600">{{ ucfirst($rental->vehicle->type) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-indigo-600">${{ $rental->vehicle->price }}</p>
                                    <p class="text-gray-600">per day</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-600">Condition</p>
                                    <p class="font-medium">{{ ucfirst($rental->vehicle->condition) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Year</p>
                                    <p class="font-medium">{{ $rental->vehicle->year }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Color</p>
                                    <p class="font-medium">{{ ucfirst($rental->vehicle->color) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">License Plate</p>
                                    <p class="font-medium">{{ $rental->vehicle->no_plat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($rental->notes)
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Additional Notes</h2>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700">{{ $rental->notes }}</p>
                    </div>
                </div>
                @endif
                
                <div class="border-t border-gray-200 pt-6 mt-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            @if($rental->payment_status == 'pending' && !$rental->is_expired)
                                <a href="{{ route('booking.payment', $rental->id) }}" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Complete Payment
                                </a>
                            @endif
                            
                            @if($rental->can_be_cancelled)
                                <form action="{{ route('customer.cancel-booking', $rental->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                        Cancel Booking
                                    </button>
                                </form>
                            @endif
                        </div>
                        
                        <div>
                            @if($rental->payment_status == 'confirmed' || $rental->payment_status == 'completed')
                                <a href="{{ route('booking.receipt', $rental->id) }}" class="inline-block px-6 py-3 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Download Receipt
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
