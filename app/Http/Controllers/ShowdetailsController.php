<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class ShowdetailsController extends Controller
{
    public function index($id) // Terima ID kendaraan dari URL
    {
        // Ambil data kendaraan berdasarkan ID
        $vehicle = Vehicles::find($id);

        // Jika kendaraan tidak ditemukan, tampilkan error 404
        if (!$vehicle) {
            abort(404, 'Mobil tidak ditemukan.');
        }

        // Kirim data kendaraan ke view
        return view('booking.showdetails', compact('vehicle'));
    }

}
