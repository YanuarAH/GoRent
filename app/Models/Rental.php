<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'id_car',
        'rental_date',
        'return_date',
        'total_cost'
        
    ];
}