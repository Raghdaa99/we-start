<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'freelancer_id', 'project_id', 'description', 'cost',
        'duration', 'duration_unit', 'status',
    ];

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    public static function duration_units()
    {
        return [
            'day', 'week', 'month', 'year'
        ];
    }
}
