<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'user_name', 'price_total',
        'user_mobile',
        'user_email',
        'start_date',
        'end_date',
        'number_guests',
        'notes'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
