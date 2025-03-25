<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $activeType = $request->input('type', 'all');
        $query = Vehicles::query();

        if ($activeType !== 'all') {
            $query->where('type', $activeType);
        }

        $vehicles = $query->get();

        return view('admin.adminpage', compact('vehicles', 'activeType'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'no_plat' => 'required|string|unique:vehicles',
            'condition' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehicles', 'public');
            $validatedData['image'] = 'vehicles/'.basename($imagePath);
        }

        Vehicles::create($validatedData);

        return redirect()->route('admin')->with('success', 'Vehicle added successfully.');
    }

    public function edit(Vehicles $vehicle)
    {
        return view('admin.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicles $vehicle)
    {
        $rules = [
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'condition' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Jika admin memilih untuk mengubah nomor plat
        if ($request->has('change_plate') && $request->change_plate) {
            $rules['no_plat'] = 'required|string|unique:vehicles,no_plat,'.$vehicle->id;
        } else {
            // Pertahankan nomor plat lama
            $request->merge(['no_plat' => $request->current_plate]);
        }

        $validatedData = $request->validate($rules);

        // Handle gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehicles', 'public');
            $validatedData['image'] = 'vehicles/'.basename($imagePath);
        }

        $vehicle->update($validatedData);

        return redirect()->route('admin')->with('success', 'Data kendaraan diperbarui');
    }
    public function destroy(Vehicles $vehicle)
    {
    try {
        // Hapus gambar terkait jika ada        
        $vehicle->delete();
        
        return redirect()->route('admin')
               ->with('success', 'Vehicle deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->back()
               ->with('error', 'Failed to delete vehicle: '.$e->getMessage());
    }
    }
}