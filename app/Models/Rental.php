<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'customer_name',
        'customer_nik',
        'customer_phone',
        'customer_address',
        'customer_gender',
        'rental_date',
        'return_date',
        'total_payment',
        'payment_status',
        'payment_order_id'
    ];

    protected $casts = [
        'rental_date' => 'date',
        'return_date' => 'date',
        'total_payment' => 'decimal:2'        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id', 'id');
    }

    public function getDurationAttribute()
    {
        if ($this->rental_date && $this->return_date) {
            return $this->rental_date->diffInDays($this->return_date) + 1; // +1 to include the rental day
        }

        return null; // atau 0, tergantung mau dianggap apa kalau datanya belum lengkap
    }

    public function getCanBeCancelledAttribute()
    {
        // Can only cancel if status is pending or confirmed and rental date is in the future
        return in_array($this->payment_status, ['pending', 'confirmed']) && $this->rental_date->isFuture();
    }
    
    public function getIsExpiredAttribute()
    {
        if ($this->payment_status === 'pending') {
            return $this->created_at->addHour()->isPast();
        }
        
        return false;
    }
    
    public function getPaymentDeadlineAttribute()
    {
        return $this->created_at->addHour();
    }
    
    /**
     * Get the effective status, considering expiration
     */
    public function getEffectiveStatusAttribute()
    {
        // If the status is pending but the payment deadline has passed, show as expired
        if ($this->payment_status === 'pending' && $this->is_expired) {
            return 'expired';
        }
        
        // If the status is confirmed and the return date has passed, show as completed
        if ($this->payment_status === 'confirmed' && $this->return_date->isPast()) {
            return 'completed';
        }
        
        if ($this->payment_status === 'paid') {
            return 'paid';
        }
        
        return $this->payment_status;
    }
    
    /**
     * Get the status color class for the badge
     */
    public function getStatusColorAttribute()
    {
        $status = $this->effective_status;
        
        switch ($status) {
            case 'pending':
                return 'bg-yellow-100 text-yellow-800';
            case 'paid':
                return 'bg-blue-100 text-blue-800';
            case 'confirmed':
                return 'bg-green-100 text-green-800';
            case 'completed':
                return 'bg-blue-100 text-blue-800';
            case 'cancelled':
                return 'bg-red-100 text-red-800';
            case 'expired':
                return 'bg-gray-100 text-gray-800';
            default:
                return 'bg-gray-100 text-gray-800';
        }
    }
    
}