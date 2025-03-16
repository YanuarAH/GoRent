<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'type',
        'brand',
        'no_plat',
        'color',
        'year',
        'ready',
        'price',
        'image',
        'condition',
    ];

    protected $casts = [
        'ready' => 'boolean',
        'year' => 'integer',
        'price' => 'integer',
    ];

    /**
     * Get the image URL for the vehicle.
     *
     * @return string
     */
    public function getImageUrl()
    {
        if ($this->image && file_exists(public_path('images/vehicles/' . $this->image))) {
            return asset('images/vehicles/' . $this->image);
        }
        
        return asset('images/vehicles/default-vehicle.jpg');
    }
}
