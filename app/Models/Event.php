<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'date',
        'venue',
        'slug',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
