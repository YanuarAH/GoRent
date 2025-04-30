@extends('layouts.admin')

@section('title', 'Edit Booking')
@section('header', 'Edit Booking')

@section('content')
<div class="mb-6">
    <a href="{{ route('bookings.manage.index') }}" class="flex items-center text-blue-600 hover:text-blue-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Bookings
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Edit Booking Details</h2>
    </div>
    
    <div class="p-6">
        <form action="{{ route('bookings.manage.update', $rental->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-md font-medium text-gray-700 mb-4">Customer Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">User Account</label>
                            <select name="user_id" id="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $rental->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $rental->customer_name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('customer_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="customer_nik" class="block text-sm font-medium text-gray-700 mb-1">NIK (ID Number)</label>
                            <input type="text" name="customer_nik" id="customer_nik" value="{{ old('customer_nik', $rental->customer_nik) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('customer_nik')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', $rental->customer_phone) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('customer_phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="customer_gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                            <select name="customer_gender" id="customer_gender" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('customer_gender', $rental->customer_gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('customer_gender', $rental->customer_gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('customer_gender')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="customer_address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea name="customer_address" id="customer_address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('customer_address', $rental->customer_address) }}</textarea>
                            @error('customer_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-md font-medium text-gray-700 mb-4">Booking Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="vehicle_id" class="block text-sm font-medium text-gray-700 mb-1">Vehicle</label>
                            <select name="vehicle_id" id="vehicle_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Select Vehicle</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $rental->vehicle_id) == $vehicle->id ? 'selected' : '' }}>
                                        {{ $vehicle->brand }} - {{ $vehicle->type }} ({{ $vehicle->no_plat }}) - Rp {{ number_format($vehicle->price, 0, ',', '.') }}/day
                                    </option>
                                @endforeach
                            </select>
                            @error('vehicle_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="rental_date" class="block text-sm font-medium text-gray-700 mb-1">Rental Date</label>
                            <input type="datetime-local" name="rental_date" id="rental_date" value="{{ old('rental_date', $rental->rental_date ? $rental->rental_date->format('Y-m-d\TH:i') : '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('rental_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="return_date" class="block text-sm font-medium text-gray-700 mb-1">Return Date</label>
                            <input type="datetime-local" name="return_date" id="return_date" value="{{ old('return_date', $rental->return_date ? $rental->return_date->format('Y-m-d\TH:i') : '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('return_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                            <select name="payment_status" id="payment_status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="pending" {{ old('payment_status', $rental->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="expired" {{ old('payment_status', $rental->payment_status) == 'expired' ? 'selected' : '' }}>Expired</option>
                                <option value="paid" {{ old('payment_status', $rental->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="confirmed" {{ old('payment_status', $rental->payment_status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ old('payment_status', $rental->payment_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('payment_status', $rental->payment_status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('payment_status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Order ID</label>
                            <div class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700">
                                {{ $rental->payment_order_id ?? 'N/A' }}
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Order ID cannot be changed</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <a href="{{ route('bookings.manage.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mr-2">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Booking
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
