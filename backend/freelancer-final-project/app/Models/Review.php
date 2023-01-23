<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function freelancer()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function project()
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class)->withDefault();
    }


}
