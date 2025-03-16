<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the directory if it doesn't exist
        $directory = public_path('images/vehicles');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        
        $vehicles = [
            [
                'brand' => 'Mercedes A-Class',
                'type' => 'sedan',
                'no_plat' => 'B 1234 ABC',
                'color' => 'black',
                'year' => 2022,
                'ready' => true,
                'price' => 25,
                'condition' => 'Normal',
                'image' => 'mercedes-sedan-1.png',
            ],
            [
                'brand' => 'Mercedes C-Class',
                'type' => 'sedan',
                'no_plat' => 'B 2345 BCD',
                'color' => 'white',
                'year' => 2023,
                'ready' => true,
                'price' => 50,
                'condition' => 'Normal',
                'image' => 'mercedes-sedan-2.png',
            ],
            [
                'brand' => 'Mercedes All New E-Class',
                'type' => 'sedan',
                'no_plat' => 'B 3456 CDE',
                'color' => 'black',
                'year' => 2022,
                'ready' => true,
                'price' => 45,
                'condition' => 'Normal',
                'image' => 'mercedes-sedan-3.png',
            ],
            [
                'brand' => 'Toyota Camry',
                'type' => 'sedan',
                'no_plat' => 'B 4567 DEF',
                'color' => 'black',
                'year' => 2023,
                'ready' => true,
                'price' => 40,
                'condition' => 'Normal',
                'image' => 'toyota-camry-sedan.png',
            ],
            [
                'brand' => 'Nissan Altima SL',
                'type' => 'sedan',
                'no_plat' => 'B 5678 EFG',
                'color' => 'blue',
                'year' => 2024,
                'ready' => true,
                'price' => 45,
                'condition' => 'Normal',
                'image' => 'NiSSAN-ALTIMA-SL-sedan.jpg',
            ],
            [
                'brand' => 'Toyota Corolla Altis',
                'type' => 'sedan',
                'no_plat' => 'B 6789 FGH',
                'color' => 'black',
                'year' => 2024,
                'ready' => true,
                'price' => 50,
                'condition' => 'Normal',
                'image' => 'toyota-corolla-altis-sedan.png',
            ],
            [
                'brand' => 'Toyota Agya',
                'type' => 'city car',
                'no_plat' => 'B 7890 GHI',
                'color' => 'silver',
                'year' => 2023,
                'ready' => true,
                'price' => 50,
                'condition' => 'Normal',
                'image' => 'toyota-agya-citycar.png',
            ],
            [
                'brand' => 'Toyota Agya',
                'type' => 'city car',
                'no_plat' => 'B 9860 EUI',
                'color' => 'red',
                'year' => 2021,
                'ready' => true,
                'price' => 40,
                'condition' => 'Normal',
                'image' => 'toyota-agya-citycar-2021.png',
            ],
            [
                'brand' => 'Toyota Camry',
                'type' => 'sedan',
                'no_plat' => 'B 8817 OFC',
                'color' => 'brown',
                'year' => 2018,
                'ready' => true,
                'price' => 35,
                'condition' => 'Normal',
                'image' => 'toyota-camry-2018.jpg',
            ],
            [
                'brand' => 'Nissan Altima',
                'type' => 'sedan',
                'no_plat' => 'B 3612 GYI',
                'color' => 'white',
                'year' => 2017,
                'ready' => true,
                'price' => 35,
                'condition' => 'Normal',
                'image' => 'Nissan-altima-2017.png',
            ],
            [
                'brand' => 'Daihatsu Ayla',
                'type' => 'city car',
                'no_plat' => 'B 7142 RHQ',
                'color' => 'blue',
                'year' => 2018,
                'ready' => true,
                'price' => 25,
                'condition' => 'Normal',
                'image' => 'daihatsu-ayla-2018-citycar.jpeg',
            ],
            [
                'brand' => 'Honda Brio',
                'type' => 'city car',
                'no_plat' => 'B 5306 QJK',
                'color' => 'yellow',
                'year' => 2020,
                'ready' => true,
                'price' => 25,
                'condition' => 'Normal',
                'image' => 'honda-brio-2020-citycar.png',
            ],
            [
                'brand' => 'Mitsubishi L300',
                'type' => 'pickup',
                'no_plat' => 'B 3728 OKB',
                'color' => 'yellow',
                'year' => 2019,
                'ready' => true,
                'price' => 30,
                'condition' => 'Normal',
                'image' => 'Mitsubishi-l300-2019-pickup.png',
            ],
            [
                'brand' => 'Suzuki Carry',
                'type' => 'pickup',
                'no_plat' => 'B 2643 TKW',
                'color' => 'yellow',
                'year' => 2019,
                'ready' => true,
                'price' => 30,
                'condition' => 'Normal',
                'image' => 'suzuki-carry-2019-pickup.png',
            ],
        ];

        // // Create a default image if it doesn't exist
        // $defaultImagePath = public_path('images/vehicles/default-vehicle.png');
        // if (!File::exists($defaultImagePath)) {
        //     // Copy a placeholder image or create a simple one
        //     File::copy(public_path('placeholder.svg'), $defaultImagePath);
        // }

        foreach ($vehicles as $vehicle) {
            Vehicles::create($vehicle);
        }
    }
}
