<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Method untuk menampilkan daftar kendaraan
    public function index()
    {
        // Data kendaraan (contoh)
        $vehicles = [
            ['id' => 1, 'name' => 'Mercedes', 'price' => 'S25 per day'],
            ['id' => 2, 'name' => 'Mercedes', 'price' => 'S50 per day'],
            ['id' => 3, 'name' => 'Toyota', 'price' => 'S35 per day'],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        return view('vehicles.index', compact('vehicles'));
    }

    // Method untuk menampilkan detail kendaraan
    public function show($id)
    {
        // Data kendaraan (contoh)
        $vehicles = [
            ['id' => 1, 'name' => 'Mercedes', 'price' => 'S25 per day', 'details' => 'Detail informasi tentang Mercedes S25'],
            ['id' => 2, 'name' => 'Mercedes', 'price' => 'S50 per day', 'details' => 'Detail informasi tentang Mercedes S50'],
            ['id' => 3, 'name' => 'Toyota', 'price' => 'S35 per day', 'details' => 'Detail informasi tentang Toyota S35'],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Cari kendaraan berdasarkan ID
        $vehicle = collect($vehicles)->firstWhere('id', $id);

        if (!$vehicle) {
            abort(404); // Jika tidak ditemukan, tampilkan 404
        }

        return view('vehicles.details', compact('vehicle'));
    }
}
