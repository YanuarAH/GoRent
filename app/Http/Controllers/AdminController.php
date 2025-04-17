<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function edit($id) // Menggunakan $id sebagai parameter route
    {
        $vehicle = Vehicles::find($id); 

        if (!$vehicle) {
            return redirect()->route('admin')->with('error', 'Kendaraan tidak ditemukan.');
        }

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
            'ready' => 'required',
            'no_plat' => 'required',
        ];
        
        $requestData = $request->all();
    
        // PERUBAHAN: Periksa checkbox dengan benar
        $vehicle->update($requestData);
        return redirect()->route('admin')->with('success', 'Data kendaraan berhasil diperbarui');
    }
        
    public function destroy(Vehicles $vehicle)
    {
        try {
            $vehicle->delete();

            return redirect()->back()->with('success', 'Vehicle deleted successfully');
            } 
            catch (\Exception $e) 
            {
            return redirect()->back()->with('error', 'Failed to delete vehicle: '.$e->getMessage());
            }
    }
}