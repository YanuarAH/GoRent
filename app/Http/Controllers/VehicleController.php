<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{

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
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin');
        }

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
