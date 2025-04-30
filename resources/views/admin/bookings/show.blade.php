@extends('layouts.admin')

@section('title', 'Booking Details')
@section('header', 'Booking Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('bookings.manage.index') }}" class="flex items-center text-blue-600 hover:text-blue-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Bookings
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Booking Information -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Booking Information</h2>
                <div>
                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                        @if($rental->payment_status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($rental->payment_status == 'expired') bg-gray-100 text-gray-800
                        @elseif($rental->payment_status == 'paid') bg-blue-100 text-blue-800
                        @elseif($rental->payment_status == 'confirmed') bg-green-100 text-green-800
                        @elseif($rental->payment_status == 'completed') bg-purple-100 text-purple-800
                        @elseif($rental->payment_status == 'cancelled') bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($rental->payment_status) }}
                    </span>
                    
                    @if($rental->isActive)
                        <span class="ml-1 px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                    @endif
                    
                    @if($rental->isOverdue)
                        <span class="ml-1 px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Overdue
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-md font-medium text-gray-700 mb-3">Booking Details</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Booking ID:</span>
                                <span class="text-sm font-medium">{{ $rental->id ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Rental Date:</span>
                                <span class="text-sm font-medium">{{ $rental->rental_date ? $rental->rental_date->format('d M Y, H:i') : 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Return Date:</span>
                                <span class="text-sm font-medium">{{ $rental->return_date ? $rental->return_date->format('d M Y, H:i') : 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Duration:</span>
                                <span class="text-sm font-medium">{{ $rental->duration }} days</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Total Payment:</span>
                                <span class="text-sm font-medium">Rp {{ number_format($rental->total_payment, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Created At:</span>
                                <span class="text-sm font-medium">{{ $rental->created_at ? $rental->created_at->format('d M Y, H:i') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-md font-medium text-gray-700 mb-3">Customer Information</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Name:</span>
                                <span class="text-sm font-medium">{{ $rental->customer_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">NIK:</span>
                                <span class="text-sm font-medium">{{ $rental->customer_nik }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Phone:</span>
                                <span class="text-sm font-medium">{{ $rental->customer_phone }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Gender:</span>
                                <span class="text-sm font-medium">{{ ucfirst($rental->customer_gender) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Address:</span>
                                <span class="text-sm font-medium">{{ $rental->customer_address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-md font-medium text-gray-700 mb-3">Update Status</h3>
                    <form action="{{ route('bookings.update-status', $rental->id) }}" method="POST" class="flex items-center space-x-4">
                        @csrf
                        @method('PATCH')
                        <select name="payment_status" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="pending" {{ $rental->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="expired" {{ $rental->payment_status == 'expired' ? 'selected' : '' }}>Expired</option>
                            <option value="paid" {{ $rental->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="confirmed" {{ $rental->payment_status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ $rental->payment_status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $rental->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Update Status
                        </button>
                    </form>
                </div>
                
                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('bookings.manage.edit', $rental->id) }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <i class="fas fa-edit mr-2"></i> Edit Booking
                    </a>
                    <form action="{{ route('bookings.manage.destroy', $rental->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Are you sure you want to delete this booking?')">
                            <i class="fas fa-trash mr-2"></i> Delete Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vehicle Information -->
    <div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Vehicle Information</h2>
            </div>
            
            <div class="p-6">
                @if($rental->vehicle)
                    <div class="flex flex-col items-center mb-4">
                        @if($rental->vehicle->image)
                            <img src="{{ asset('storage/' . $rental->vehicle->image) }}" alt="{{ $rental->vehicle->brand }}" class="h-40 w-auto object-cover rounded-md mb-4">
                        @else
                            <div class="h-40 w-full bg-gray-200 flex items-center justify-center rounded-md mb-4">
                                <i class="fas fa-car text-4xl text-gray-500"></i>
                            </div>
                        @endif
                        <h3 class="text-lg font-medium text-gray-900">{{ $rental->vehicle->brand }}</h3>
                        <p class="text-sm text-gray-500">{{ $rental->vehicle->type }}</p>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">License Plate:</span>
                            <span class="text-sm font-medium">{{ $rental->vehicle->no_plat }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Color:</span>
                            <span class="text-sm font-medium">{{ $rental->vehicle->color }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Year:</span>
                            <span class="text-sm font-medium">{{ $rental->vehicle->year }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Price per Day:</span>
                            <span class="text-sm font-medium">Rp {{ number_format($rental->vehicle->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Condition:</span>
                            <span class="text-sm font-medium">{{ $rental->vehicle->condition }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Availability:</span>
                            <span class="text-sm font-medium">{{ $rental->vehicle->ready ? 'Available' : 'Not Available' }}</span>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500">Vehicle information not available</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
