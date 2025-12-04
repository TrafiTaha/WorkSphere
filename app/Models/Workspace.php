<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price_per_hour',
        'price_per_day',
        'capacity',
        'image',
        'is_available',
        'amenities',
    ];

    protected $casts = [
        'amenities' => 'array',
        'is_available' => 'boolean',
        'price_per_hour' => 'decimal:2',
        'price_per_day' => 'decimal:2',
    ];

    /**
     * Get the bookings for the workspace.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
