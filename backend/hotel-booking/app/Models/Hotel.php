<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name',
        'slug',
        'location',
        'desc',
        'price',
        'price_special',];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'hotel_id');
    }

}
