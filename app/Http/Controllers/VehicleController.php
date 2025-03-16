<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // // Method untuk menampilkan daftar kendaraan
    // public function index()
    // {
    //     // Data kendaraan (contoh)
    //     $vehicles = [
    //         ['id' => 1, 'name' => 'Mercedes', 'price' => 'S25 per day'],
    //         ['id' => 2, 'name' => 'Mercedes', 'price' => 'S50 per day'],
    //         ['id' => 3, 'name' => 'Toyota', 'price' => 'S35 per day'],
    //         // Tambahkan data lainnya sesuai kebutuhan
    //     ];

    //     return view('vehicles.index', compact('vehicles'));
    // }

    // // Method untuk menampilkan detail kendaraan
    // public function show($id)
    // {
    //     // Data kendaraan (contoh)
    //     $vehicles = [
    //         ['id' => 1, 'name' => 'Mercedes', 'price' => 'S25 per day', 'details' => 'Detail informasi tentang Mercedes S25'],
    //         ['id' => 2, 'name' => 'Mercedes', 'price' => 'S50 per day', 'details' => 'Detail informasi tentang Mercedes S50'],
    //         ['id' => 3, 'name' => 'Toyota', 'price' => 'S35 per day', 'details' => 'Detail informasi tentang Toyota S35'],
    //         // Tambahkan data lainnya sesuai kebutuhan
    //     ];

    //     // Cari kendaraan berdasarkan ID
    //     $vehicle = collect($vehicles)->firstWhere('id', $id);

    //     // if (!$vehicle) {
    //     //     abort(404); // Jika tidak ditemukan, tampilkan 404
    //     // }

    //     return view('vehicles.index', compact('vehicles'));
    // }

    // Menampilkan daftar mobil dengan filter
    /**
     * Display a listing of the vehicles.
     */
    public function index(Request $request)
    {
        $type = $request->query('type');

        $query = Vehicles::query()->where('ready', true);

        // Filter by vehicle type if specified
        if ($type && $type !== 'all') {
            $query->where('type', $type);
        }

        $vehicles = $query->get();

        // Get unique vehicle types for the filter buttons
        $vehicleTypes = Vehicles::distinct()->pluck('type')->toArray();

        return view('vehicles.index', [
            'vehicles' => $vehicles,
            'vehicleTypes' => $vehicleTypes,
            'activeType' => $type ?? 'all'
        ]);
    }

    /**
     * Display the specified vehicle.
     */
    public function detail(Vehicles $vehicle)
    {
        // Get random vehicles excluding the current one
        $randomVehicles = Vehicles::where('id', '!=', $vehicle->id)
            ->where('ready', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('vehicles.details', [
            'vehicle' => $vehicle,
            'randomVehicles' => $randomVehicles
        ]);
    }

    public function homepagecar(Vehicles $vehicle)
    {
        // Get random vehicles excluding the current one
        $randomVehicles = Vehicles::where('id', '!=', $vehicle->id)
            ->where('ready', true)
            ->inRandomOrder()
            ->take(6)
            ->get();

        return view('homepage', [
            'randomVehicles' => $randomVehicles
        ]);
    }
}
