@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-center border-2 border-dashed border-gray-400 py-2 mb-6">Tambah Mobil Baru</h1>
        
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="bg-indigo-600 rounded-lg p-8">
            @csrf
            
            <h2 class="text-2xl font-semibold text-white mb-6 text-center">Informasi Mobil</h2>
            
            <div class="space-y-4">
                <div>
                    <input type="text" name="brand" value="{{ old('brand') }}" placeholder="Nama Mobil" 
                           class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                </div>
                
                <div>
                    <select name="type" class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                        <option value="" disabled selected>Tipe Mobil</option>
                        <option value="sedan" {{ old('type') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="city car" {{ old('type') == 'city car' ? 'selected' : '' }}>City Car</option>
                        <option value="suv" {{ old('type') == 'suv' ? 'selected' : '' }}>SUV</option>
                        <option value="pickup" {{ old('type') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                        <option value="minivan" {{ old('type') == 'minivan' ? 'selected' : '' }}>Minivan</option>
                    </select>
                </div>
                
                <div>
                    <input type="number" name="year" value="{{ old('year') }}" placeholder="Tahun Produksi" 
                           class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                </div>
                
                <div>
                    <input type="text" name="no_plat" value="{{ old('no_plat') }}" placeholder="Nomor Plat" 
                           class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                </div>
                
                <div>
                    <input type="text" name="color" value="{{ old('color') }}" placeholder="Warna Mobil" 
                           class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                </div>
                
                <div>
                    <select name="condition" class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                        <option value="" disabled selected>Kondisi</option>
                        <option value="Normal" {{ old('condition') == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Service" {{ old('condition') == 'Service' ? 'selected' : '' }}>Service</option>
                    </select>
                </div>
                
                <div>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="Harga Sewa per Hari" 
                           class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                </div>
                
                <div>
                    <select name="ready" class="w-full px-4 py-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300">
                        <option value="" disabled selected>Status Ketersediaan</option>
                        <option value="1" {{ old('ready') == '1' ? 'selected' : '' }}>Tersedia (1)</option>
                        <option value="0" {{ old('ready') == '0' ? 'selected' : '' }}>Tidak Tersedia (0)</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-8 bg-white p-6 rounded-lg">
                <div class="flex items-center justify-center">
                    <div id="image-preview" class="w-full h-48 flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg mb-4">
                        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-bI24Mq049JL95JDMkjpTcQQxaMdNvu.png" alt="Car silhouette" class="h-32 object-contain opacity-30">
                    </div>
                </div>
                
                <div class="mt-2">
                    <label for="image-upload" class="block w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-center rounded-md font-medium cursor-pointer">
                        Tambah Foto Mobil
                        <input id="image-upload" type="file" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </label>
                </div>
            </div>
            
            <div class="mt-8">
                <button type="submit" class="w-full py-4 bg-green-500 hover:bg-green-600 text-white font-medium rounded-md transition duration-200">
                    Unggah
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image-preview');
            output.innerHTML = '';
            const img = document.createElement('img');
            img.src = reader.result;
            img.className = 'h-full object-contain';
            output.appendChild(img);
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection

