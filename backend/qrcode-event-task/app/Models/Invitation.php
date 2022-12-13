<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['conference_name',
        'slug',
        'desc'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function forms()
    {
        return $this->hasMany(Invitation::class, 'invitation_id');
    }
}
