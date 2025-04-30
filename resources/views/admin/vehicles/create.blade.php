@extends('layouts.admin')

@section('title', 'Add New Vehicle')
@section('header', 'Add New Vehicle')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Vehicle Details</h2>
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

        <form action="{{ route('vehicles.manage.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <div class="mb-4">
                        <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Brand/Model</label>
                        <input type="text" name="brand" id="brand" value="{{ old('brand') }}" placeholder="e.g. Toyota Avanza"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Vehicle Type</label>
                        <select name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="" disabled selected>Select Vehicle Type</option>
                            <option value="sedan" {{ old('type') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="city car" {{ old('type') == 'city car' ? 'selected' : '' }}>City Car</option>
                            <option value="suv" {{ old('type') == 'suv' ? 'selected' : '' }}>SUV</option>
                            <option value="pickup" {{ old('type') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                            <option value="minivan" {{ old('type') == 'minivan' ? 'selected' : '' }}>Minivan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                        <input type="number" name="year" id="year" value="{{ old('year') }}" placeholder="e.g. 2022"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="no_plat" class="block text-sm font-medium text-gray-700 mb-1">License Plate</label>
                        <input type="text" name="no_plat" id="no_plat" value="{{ old('no_plat') }}" placeholder="e.g. B 1234 ABC"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color') }}" placeholder="e.g. Black"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Condition</label>
                        <select name="condition" id="condition" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="" disabled selected>Select Condition</option>
                            <option value="Normal" {{ old('condition') == 'Normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Service" {{ old('condition') == 'Service' ? 'selected' : '' }}>Service</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Rental Price (per day)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="e.g. 500000"
                                class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="ready" class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
                        <select name="ready" id="ready" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="" disabled selected>Select Availability</option>
                            <option value="1" {{ old('ready', '1') == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('ready') == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="mt-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Vehicle Image</label>
                <div id="dropzone"
                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer hover:border-blue-400 transition">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M..."></path> <!-- icon upload, optional ganti -->
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                <span>Upload a file</span>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                    </div>
                </div>

                <!-- Hidden input -->
                <input id="image" name="image" type="file" accept="image/*" class="hidden" onchange="previewImage(event)">

                <!-- Preview image -->
                <div class="mt-4">
                    <img id="preview" class="hidden w-100 h-100 object-cover rounded-md mx-auto" />
                </div>
            </div>


            <!-- Submit Buttons -->
            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mr-2">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Add Vehicle
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Allow click on dropzone to open file browser
    document.getElementById('dropzone').addEventListener('click', function () {
        document.getElementById('image').click();
    });

    // Bonus (kalau mau drag & drop langsung upload preview)
    document.getElementById('dropzone').addEventListener('dragover', function (e) {
        e.preventDefault();
        this.classList.add('border-blue-400');
    });

    document.getElementById('dropzone').addEventListener('dragleave', function (e) {
        e.preventDefault();
        this.classList.remove('border-blue-400');
    });

    document.getElementById('dropzone').addEventListener('drop', function (e) {
        e.preventDefault();
        this.classList.remove('border-blue-400');
        const fileInput = document.getElementById('image');
        fileInput.files = e.dataTransfer.files;
        previewImage({ target: fileInput });
    });
</script>

@endsection