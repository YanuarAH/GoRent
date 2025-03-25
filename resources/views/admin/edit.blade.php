@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-indigo-600 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">Edit Informasi Mobil</h1>
        </div>

        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Merek</label>
                            <input type="text" name="brand" value="{{ old('brand', $vehicle->brand) }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Nomor Plat Saat Ini</label>
                            <input type="text" value="{{ $vehicle->no_plat }}" 
                                   class="w-full px-4 py-2 border rounded-lg bg-gray-100" 
                                   readonly
                                   id="currentPlate">
                        </div>
                        
                        <!-- Checkbox untuk opsi perubahan -->
                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="change_plate" id="changePlateCheckbox" 
                                       class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-gray-700">Ubah Nomor Plat</span>
                            </label>
                        </div>
                        
                        <!-- Field untuk nomor plat baru -->
                        <div id="newPlateField" class="mb-4 hidden">
                            <label class="block text-gray-700">Nomor Plat Baru</label>
                            <input type="text" name="no_plat" 
                                   class="w-full px-4 py-2 border rounded-lg"
                                   placeholder="Masukkan nomor plat baru"
                                   id="newPlateInput">
                        </div>
                        
                        <!-- Input hidden untuk mempertahankan nilai lama -->
                        <input type="hidden" name="current_plate" value="{{ $vehicle->no_plat }}">

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Tipe</label>
                            <select name="type" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="" disabled selected>Tipe Mobil</option>
                        <option value="sedan" {{ old('type', $vehicle->type) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="city car" {{ old('type', $vehicle->type) == 'city car' ? 'selected' : '' }}>City Car</option>
                        <option value="suv" {{ old('type', $vehicle->type) == 'suv' ? 'selected' : '' }}>SUV</option>
                        <option value="pickup" {{ old('type', $vehicle->type) == 'pickup' ? 'selected' : '' }}>Pickup</option>
                        <option value="minivan" {{ old('type', $vehicle->type) == 'minivan' ? 'selected' : '' }}>Minivan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Tipe</label>
                            <select name="ready" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="" disabled selected>Status Ketersediaan</option>
                                <option value="1" {{ old('ready', $vehicle->ready) == '1' ? 'selected' : '' }}>Tersedia (1)</option>
                                <option value="0" {{ old('ready', $vehicle->ready) == '0' ? 'selected' : '' }}>Tidak Tersedia (0)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Tahun Produksi</label>
                            <input type="number" name="year" value="{{ old('year', $vehicle->year) }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Warna</label>
                            <input type="text" name="color" value="{{ old('color', $vehicle->color) }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Harga Sewa/Hari</label>
                            <input type="number" name="price" value="{{ old('price', $vehicle->price) }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Status</label>
                            <select name="condition" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="Normal" {{ old('condition', $vehicle->condition) == 'Normal' ? 'selected' : '' }}>Normal</option>
                                <option value="Service" {{ old('condition', $vehicle->condition) == 'Service' ? 'selected' : '' }}>Service</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div class="mt-6">
                    <label class="block text-gray-700 font-medium mb-2">Foto Mobil</label>
                    <div class="flex items-center space-x-4">
                        @if($vehicle->image)
                            <div class="w-32 h-32 bg-gray-100 rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/'.$vehicle->image) }}" alt="{{ $vehicle->brand }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">
                            <label for="image" class="inline-block px-4 py-2 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300">
                                Pilih File
                            </label>
                            <span id="file-name" class="ml-2 text-gray-600">@if($vehicle->image) {{ basename($vehicle->image) }} @else Tidak ada file dipilih @endif</span>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Format: JPEG, PNG, JPG (Maks. 2MB)</p>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Toggle field nomor plat baru
    document.getElementById('changePlateCheckbox').addEventListener('change', function() {
    const newPlateField = document.getElementById('newPlateField');
    const currentPlate = document.getElementById('currentPlate').value;
    const newPlateInput = document.getElementById('newPlateInput');
    
    if (this.checked) {
        newPlateField.classList.remove('hidden');
        newPlateInput.value = currentPlate; // Isi dengan nilai lama sebagai default
    } else {
        newPlateField.classList.add('hidden');
        newPlateInput.value = currentPlate; // Kembalikan ke nilai lama
    }
});
</script>
@endsection