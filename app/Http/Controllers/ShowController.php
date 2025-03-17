<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use App\Models\Rental;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');

        $query = Vehicles::query()
        ->where('ready', true) // Hanya mobil yang ready = true
        ->where('condition', true); // Hanya mobil yang condition = true

        // Filter by vehicle type if specified
        if ($type && $type !== 'all') {
            $query->where('type', $type);
        }

        $vehicles = $query->get();

        // Get unique vehicle types for the filter buttons
        $vehicleTypes = Vehicles::distinct()->pluck('type')->toArray();

        return view('booking.show', [
            'vehicles' => $vehicles,
            'vehicleTypes' => $vehicleTypes,
            'activeType' => $type ?? 'all'
        ]);
    }
}
