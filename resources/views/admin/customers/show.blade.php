@extends('layouts.admin')

@section('title', 'User Details')
@section('header', 'User Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('customers.manage.index') }}" class="flex items-center text-blue-600 hover:text-blue-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Users
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- User Information -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">User Information</h2>
            </div>
            
            <div class="p-6">
                <div class="flex flex-col items-center mb-6">
                    <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mb-4">
                        <i class="fas fa-user text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    <span class="mt-2 px-3 py-1 text-xs font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                        {{ ucfirst($user->role ?? 'user') }}
                    </span>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <h4 class="text-md font-medium text-gray-700 mb-3">Account Details</h4>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">User ID:</span>
                            <span class="text-sm font-medium">{{ $user->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Registered:</span>
                            <span class="text-sm font-medium">{{ $user->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Last Updated:</span>
                            <span class="text-sm font-medium">{{ $user->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('customers.manage.edit', $user->id) }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <i class="fas fa-edit mr-2"></i> Edit User
                    </a>
                    <form action="{{ route('customers.manage.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Are you sure you want to delete this user?')">
                            <i class="fas fa-trash mr-2"></i> Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Customer Information -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Customer Profile</h2>
            </div>
            
            <div class="p-6">
                @if($user->customer)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-md font-medium text-gray-700 mb-3">Personal Information</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500">Full Name:</span>
                                    <span class="text-sm font-medium">{{ $user->customer->name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500">NIK:</span>
                                    <span class="text-sm font-medium">{{ $user->customer->nik ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500">Gender:</span>
                                    <span class="text-sm font-medium">{{ $user->customer->gender ? ucfirst($user->customer->gender) : 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-md font-medium text-gray-700 mb-3">Contact Information</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500">Phone:</span>
                                    <span class="text-sm font-medium">{{ $user->customer->phone ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500">Email:</span>
                                    <span class="text-sm font-medium">{{ $user->email }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-500 mb-1">Address:</span>
                                    <span class="text-sm font-medium">{{ $user->customer->address ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500">No customer profile available</p>
                        <a href="{{ route('customers.manage.edit', $user->id) }}" class="mt-2 inline-flex items-center text-blue-600 hover:text-blue-900">
                            <i class="fas fa-plus-circle mr-1"></i> Create customer profile
                        </a>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Rental History -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Rental History</h2>
            </div>
            
            <div class="p-6">
                <!-- Active Rentals -->
                <h3 class="text-md font-medium text-gray-700 mb-3">Active Rentals</h3>
                @if($activeRentals->count() > 0)
                    <div class="overflow-x-auto mb-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($activeRentals as $rental)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-900">{{ $rental->vehicle->brand ?? 'N/A' }}</div>
                                                <div class="text-sm text-gray-500">{{ $rental->vehicle->no_plat ?? 'N/A' }}</div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-900">{{ $rental->rental_date ? $rental->rental_date->format('d M Y') : 'N/A' }}</div>
                                                <div class="text-sm text-gray-500">{{ $rental->return_date ? $rental->return_date->format('d M Y') : 'N/A' }}</div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'expired' => 'bg-gray-100 text-gray-800',
                                                    'paid' => 'bg-blue-100 text-blue-800',
                                                    'confirmed' => 'bg-green-100 text-green-800',
                                                    'completed' => 'bg-purple-100 text-purple-800',
                                                    'cancelled' => 'bg-red-100 text-red-800',
                                                ];
                                                $statusColor = $statusColors[$rental->payment_status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                                {{ ucfirst($rental->payment_status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('bookings.manage.show', $rental->id) }}" class="text-blue-600 hover:text-blue-900">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-sm text-gray-500 mb-6">No active rentals</p>
                @endif
                
                <!-- Rental History Tabs -->
                <div x-data="{ activeTab: 'completed' }">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8">
                            <button @click="activeTab = 'completed'" :class="{ 'border-blue-500 text-blue-600': activeTab === 'completed', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'completed' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Completed Rentals
                            </button>
                            <button @click="activeTab = 'pending'" :class="{ 'border-blue-500 text-blue-600': activeTab === 'pending', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'pending' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Pending Rentals
                            </button>
                        </nav>
                    </div>
                    
                    <!-- Completed Rentals -->
                    <div x-show="activeTab === 'completed'" class="mt-4">
                        @if($completedRentals->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($completedRentals as $rental)
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex flex-col">
                                                        <div class="text-sm font-medium text-gray-900">{{ $rental->vehicle->brand ?? 'N/A' }}</div>
                                                        <div class="text-sm text-gray-500">{{ $rental->vehicle->no_plat ?? 'N/A' }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex flex-col">
                                                        <div class="text-sm font-medium text-gray-900">{{ $rental->rental_date ? $rental->rental_date->format('d M Y') : 'N/A' }}</div>
                                                        <div class="text-sm text-gray-500">{{ $rental->return_date ? $rental->return_date->format('d M Y') : 'N/A' }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                                    Rp {{ number_format($rental->total_payment, 0, ',', '.') }}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('bookings.manage.show', $rental->id) }}" class="text-blue-600 hover:text-blue-900">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($user->rentals()->where('payment_status', 'completed')->count() > 5)
                                <div class="mt-4 text-center">
                                    <a href="{{ route('rentals.index', ['user_id' => $user->id, 'status' => 'completed']) }}" class="text-blue-600 hover:text-blue-900">
                                        View all completed rentals
                                    </a>
                                </div>
                            @endif
                        @else
                            <p class="text-sm text-gray-500">No completed rentals</p>
                        @endif
                    </div>
                    
                    <!-- Pending Rentals -->
                    <div x-show="activeTab === 'pending'" class="mt-4" style="display: none;">
                        @if($pendingRentals->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($pendingRentals as $rental)
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex flex-col">
                                                        <div class="text-sm font-medium text-gray-900">{{ $rental->vehicle->brand ?? 'N/A' }}</div>
                                                        <div class="text-sm text-gray-500">{{ $rental->vehicle->no_plat ?? 'N/A' }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex flex-col">
                                                        <div class="text-sm font-medium text-gray-900">{{ $rental->rental_date ? $rental->rental_date->format('d M Y') : 'N/A' }}</div>
                                                        <div class="text-sm text-gray-500">{{ $rental->return_date ? $rental->return_date->format('d M Y') : 'N/A' }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                                            'expired' => 'bg-gray-100 text-gray-800',
                                                        ];
                                                        $statusColor = $statusColors[$rental->payment_status] ?? 'bg-gray-100 text-gray-800';
                                                    @endphp
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                                        {{ ucfirst($rental->payment_status) }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('rentals.show', $rental->id) }}" class="text-blue-600 hover:text-blue-900">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($user->rentals()->whereIn('payment_status', ['pending', 'expired'])->count() > 5)
                                <div class="mt-4 text-center">
                                    <a href="{{ route('rentals.index', ['user_id' => $user->id, 'status' => 'pending']) }}" class="text-blue-600 hover:text-blue-900">
                                        View all pending rentals
                                    </a>
                                </div>
                            @endif
                        @else
                            <p class="text-sm text-gray-500">No pending rentals</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
