<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'first_name', 'last_name', 'description', 'skills',
        'title', 'hourly_rate', 'country',
    ];

    protected $casts = [
        'birthday' => 'datetime',
        'hourly_rate' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getSkillsArrAttribute()
    {
        return explode(', ',$this->skills);
    }
}
