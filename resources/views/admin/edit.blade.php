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
                            <input type="text" value="{{ $vehicle->brand }}" 
                                   class="w-full px-4 py-2 border rounded-lg bg-gray-100" 
                                   readonly>
                            <!-- Tambahkan hidden input untuk menyimpan nilai brand -->
                            <input type="hidden" name="brand" value="{{ $vehicle->brand }}">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700">Nomor Plat</label>
                            <input type="text" value="{{ $vehicle->no_plat }}" 
                                   class="w-full px-4 py-2 border rounded-lg bg-gray-100" 
                                   readonly>
                            <!-- Simpan nomor plat dalam hidden input -->
                            <input type="hidden" name="no_plat" value="{{ $vehicle->no_plat }}">
                        </div>
                        
                        <!-- Hapus bagian checkbox dan field nomor plat baru karena tidak bisa diedit -->
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Tipe</label>
                            <input type="text" value="{{ $vehicle->type }}" 
                                   class="w-full px-4 py-2 border rounded-lg bg-gray-100" 
                                   readonly>
                            <!-- Tambahkan hidden input untuk menyimpan nilai type -->
                            <input type="hidden" name="type" value="{{ $vehicle->type }}">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Status Ketersediaan</label>
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
                                <input type="text" value="{{ $vehicle->year }}" 
                                       class="w-full px-4 py-2 border rounded-lg bg-gray-100" 
                                       readonly>
                                <!-- Tambahkan hidden input untuk menyimpan nilai year -->
                                <input type="hidden" name="year" value="{{ $vehicle->year }}">
                            </div>
                        
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Warna</label>
                                <input type="text" value="{{ $vehicle->color }}" 
                                       class="w-full px-4 py-2 border rounded-lg bg-gray-100" 
                                       readonly>
                                <!-- Tambahkan hidden input untuk menyimpan nilai color -->
                                <input type="hidden" name="color" value="{{ $vehicle->color }}">
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

                <!-- Upload Gambar -->
                {{-- <div class="mt-6">
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
                </div> --}}

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