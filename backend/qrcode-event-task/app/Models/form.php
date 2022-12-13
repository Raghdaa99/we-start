<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

    protected $fillable = ['user_name',
        'user_email',
        'user_mobile',
        'invitation_id'];
}
